<template>
    <div>
        <div class="uk-grid">
            <div class="uk-width-1-4" v-for="item in abonements" :key="item.id">
                <div class="md-card">
                    <div class="md-card-content">
                        <p>{{item.name}}</p>
                        <p>Число тренировок: {{item.workout.number_workouts}}</p>
                        <p>Число заморозок: {{item.workout.number_freezing}}</p>
                        <p>Цена: {{item.workout.price_workouts}}</p>
                    </div>
                    <button class="md-btn md-btn-small" @click="selectAbonement(item)" :class="{'md-btn-info': abonement.id != item.idm, 'md-btn-primary': abonement.id == item.id}">Выбрать</button>
                </div>
            </div>
        </div>
        <div class="uk-grid">
            <div class="uk-width-1-3">
                <div class="md-card">
                    <div class="md-card-content">
                        <p>Выбранный абонемент:</p>
                        <div v-if="abonement.id">
                            <p>{{abonement.name}}</p>
                            <p>Выберите дни тренировок ({{selectedTrainings.length }} / {{abonement.workout.number_workouts}}):</p>
                            <ul class="md-list">
                                <li class="md-list-item" v-for="item in selectedTrainings" :key="item.id">
                                    {{item.start}}
                                </li>
                            </ul>
                            <button @click="pay" class="md-btn md-btn-primary md-btn small">Оплатить {{abonement.workout.price_workouts}}</button>
                        </div>
                        <div v-else>Не выбран</div>
                    </div>
                </div>
            </div>
            <div class="uk-width-2-3">
                <div class="md-card">
                    <div class="md-card-content">
                        <div id='calendar1'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['child'],
    data(){
        return {
            abonements: [],
            abonement: {},
            calendar: false,
            selectedTrainings: [],
            trainings: []
        }
    },
    async created(){
        await this.loadAbonements()
        await this.loadTrainings(moment().startOf('month'), moment().endOf('month'))
        this.calendar = new FullCalendar.Calendar($('#calendar1'), {
            initialView: 'dayGridMonth',
            locale: 'ru',
            events: this.trainings,
            eventClick: this.toggleTraining
        });
        this.calendar.render();
    },
    methods: {
        selectAbonement(item){
            this.abonement = item
            this.selectedTrainings = []
        },
        async loadAbonements(){
            const {data} = await axios.get('/groups/' + this.child.group_id + '/abonements')
            this.abonements = data
        },
        toggleTraining(item){
            const index = this.selectedTrainings.findIndex( t => t.id == item.id)
            if(index > -1){
                this.selectedTrainings.splice(index, 1)
                item.color = 'red'
            }else if(this.selectedTrainings.length < this.abonement.workout.number_workouts){
                this.selectedTrainings.push(item)
                item.color = ''
            }
        },
        async loadTrainings(start, end){
            this.selectedTrainings = []
            const {data} = await axios.get('/groups/' + this.child.group_id + '/trainings', { params: {start: start.format('YYYY-MM-DD'), end: end.format('YYYY-MM-DD')} })
            this.trainings = data
        },
        async pay(){
            if(this.selectedTrainings.length < this.abonement.workout.number_workouts){
                alert('Выберите еще ' + (this.abonement.workout.number_workouts -  this.selectedTrainings.length) + ' тренировок')
                return false
            }
            try{
                await axios.post('/parents/chidlren/'+this.child.id+'/abonements/'+this.abonement.id+'/pay', this.selectedTrainings.map(t=>t.id))
            }catch(e){}
        }
    }
}
</script>