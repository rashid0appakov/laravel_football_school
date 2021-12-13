<template>
<div>
    <div class="md-card">
        <div class="md-card-content">
            <div class="uk-grid">
                <div class="uk-width-1-4">
                    <input autocomplete="off" class="md-input" type="text" placeholder="Выберите дату" readonly data-uk-datepicker ref="date">
                </div>
                <div class="uk-width-3-4">
                    <table width="100%">
                        <tr>
                            <td align="center" v-for="(day, i) in week" :key="i">
                                {{day.format('ddd')}} <br>
                                <small>{{day.format('DD.MM')}}</small>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div v-for="club in clubs" :key="club.id">
                <div style="text-aligh: center; font-weight: bold">{{club.name}}</div>
                <div class="uk-grid" v-for="group in club.groups" :key="group.id">
                    <div class="uk-width-1-4">
                        {{group.age_start}} - {{group.age_end}}
                    </div>
                    <div class="uk-width-3-4">
                        <table width="100%">
                            <tr>
                                <td v-for="(day, index) in week" :key="index" width="14.29%">
                                    <div v-if="trainings[group.id] && trainings[group.id][index]">
                                        <a :href="'/' + role + '/trainings/' + item.id + '/edit'" class="badge" v-for="item in trainings[group.id][index + 1]" :key="item.id">
                                            {{item.start}} - {{item.end}} {{item.children_count}} ({{item.temp_users_count}}) <br>
                                            <div v-if="item.trainer">{{item.trainer.name}}</div>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['role'],
    data(){
        return {
            trainings: [],
            clubs: [],
            date: moment(),
            months: moment.months(),
            week: [],
            start_at: false,
            end_at: false
        }
    },
    async created(){
        this.start_at = moment().startOf('isoWeek')
        this.end_at = moment().endOf('isoWeek')
        this.fillWeek()
        await this.loadClubs()
        await this.loadTrainings()
        this.$refs.date.onchange = this.updateDates
    },
    methods: {
        async loadTrainings(){
            const {data} = await axios.get('/' + this.role + '/trainings/getData', { params: {start: this.start_at.format('YYYY-MM-DD'), end: this.end_at.format('YYYY-MM-DD')}})
            const trainings = {}
            data.forEach( item => {
                if(!trainings[item.group_id]) trainings[item.group_id] = this._getEmptyWeek()
                const day = moment(item.date).format('d')
                trainings[item.group_id][day].push(item)
            })
            this.trainings = trainings
        },
        async loadClubs(){
            const {data} = await axios.get('/clubs')
            this.clubs = data
        },
        updateDates(e){
            this.start_at = moment(e.target.value, 'DD.MM.YYYY').startOf('isoWeek')
            this.end_at = moment(e.target.value, 'DD.MM.YYYY').endOf('isoWeek')
            this.fillWeek()
            this.loadTrainings()
        },
        fillWeek(){
            this.week = []
            let currDate = this.start_at.clone()
            let i = 0;
            while(i++ < 7){
                this.week.push(currDate.clone())
                currDate.add(1, 'd')
            }
        },
        _getEmptyWeek(){
            const week = {}
            for(let i = 0; i < 7; i++){
                week[i] = []
            }
            return week
        }
    }
}
</script>
<style scoped>
.badge{
    width: 95%;
    display: inline-block;
    margin: 0 auto 2px;
    padding: 2px 4px;
    background: #007aff;
    color: #fff;
    text-align: center;
    font-size: 0.8em;
}
.badge.accept{
    background: rgb(125, 197, 53);
}
.badge.canceled{
    background: chocolate;
}
table td{
    padding: 1px;
}
.club{
    border-bottom: 1px solid red;
}
</style>