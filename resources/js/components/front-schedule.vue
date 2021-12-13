<template>
<div class="subscription-tabs">
    <span class="sm-title text-center subscription_title">Расписание и стоимость занятий</span>
    <ul class="nav nav-tabs nav-tabs_subscription">
        <li class="nav-item" role="presentation" v-for="item in groups" :key="item.id">
            <button class="nav-link nav-link_news" @click="selectGroup(item)" :class="{active: item.id == group.id}">{{item.age_start}} - {{item.age_end}}</button>
        </li>
    </ul>
    <div class="timetable-wrp">
        <div class="timetable">
            <span class="timetable_title">Расписание {{start}} - {{end}}</span>
            <button class="button main-btn main-btn_reviews" @click="changeWeek('prev')"><</button>
            <button class="button main-btn main-btn_reviews" @click="changeWeek('next')">></button>
            <div class="timetable_row">
                <div class="timetable_col" v-for="(item, i) in ['ПН','ВТ','СР','ЧТ','ПТ','СБ','ВС']" :key="i">
                    <span class="timetable__day">{{item}}</span>
                    <span v-for="t in trainings[i+1]" :key="t.id">
                        <span class="timetable__txt">Тренировка</span><br>
                        <span class="timetable__time">{{t.start}}</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="subscription-wrp">
        <div class="subscription-table-wrp">
            <table class="subscription-table">
                <caption class="timetable_title">Абонементы</caption>
                <tbody>
                    <tr>
                        <th class="subscription-title">Занятий (и заморозок)</th>
                        <th class="subscription-title">Тренировка (в месяц)</th>
                        <th class="subscription-title">Стоимость абонемента</th>
                    </tr>
                    <tr v-for="item in abonements" :key="item.id">
                        <td class="subscription-text">{{item.workout.number_workouts}} ({{item.workout.number_freezing}})</td>
                        <td class="subscription-text">450 (3600) ₽</td>
                        <td class="subscription-text price">{{item.workout.price_workouts}} ₽</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="subscription-ps">
        <img src="/img/gift_2x.png" alt="gift icon" class="subscription-ps_img">
        <span class="subscription-ps_txt">При покупке первого абонемента, спортивная форма вподарок</span>
    </div>
    <div class="subscription-ps">
        <img src="/img/cash.png" alt="cash icon" class="subscription-ps_img">
        <span class="subscription-ps_txt">Цены могут отличаться в зависимости от выбранного клуба</span>
    </div>
    <button class="main-btn button main-btn_submit subscription-btn"  data-toggle="modal" data-target="#formulair" >Оставить заявку</button>
    <div class="modal fade" id="formulair">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <div class="modal-body row">
                    <form class="col" action="" method="POST" @click.prevent="send">
                        <div class="form-group"> 
                            <div class="uk-grid" data-uk-grid-margin>
                                <label class="col-md-4 col-form-label text-md-right">Имя</label>
                                <div class="col-md-12">
                                    <input v-model="form.name" type="text" class="form-control" name="name" required autocomplete="off" autofocus>
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <label class="col-md-4 col-form-label text-md-right">Телефон</label>
                                <div class="col-md-12">
                                    <input v-model="form.phone" type="tel" class="form-control" required>
                                </div>
                            </div>        
                        </div>
                        <button class="button main-btn main-btn_reviews">Оставить заявку</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['club', 'title'],
    data(){
        return {
            trainings: {},
            abonements: [],
            form: {},
            groups: [],
            group: false,
            start: moment().startOf("week").format('YYYY-MM-DD'),
            end: moment().endOf('week').format('YYYY-MM-DD')
        }
    },
    async created(){
        const {data} = await axios.get('/clubs/' + this.club.id + '/groups')
        this.groups = data;
        this.group = data[0];
        await this.loadTrainings()
        await this.loadAbonements()
    },
    methods: {
        fillTrainingsDefault(){
            const trainings = {};
            [1,2,3,4,5,6,7].forEach(item => {
                trainings[item] = []
            })
            this.trainings = trainings
        },
        async send(){
            try{
                await axios.post('/leads', this.form)
                this.form = {}
                $('#formulair').modal('hide')
                $('#thanksModal').modal('show')
            }catch(e){}
        },
        async changeWeek(type){
            if(type == 'prev'){
                this.start = moment(this.start).subtract('days', 7).format('YYYY-MM-DD')
                this.end = moment(this.end).subtract('days', 7).format('YYYY-MM-DD')
            }else{
                this.start = moment(this.start).add('days', 7).format('YYYY-MM-DD')
                this.end = moment(this.end).add('days', 7).format('YYYY-MM-DD')
            }
            await this.loadTrainings()
        },
        async selectGroup(item){
          this.group = item
          await this.loadTrainings()
          await this.loadAbonements()
        },
        async loadTrainings(){
            const {data} = await axios.get('/groups/' + this.group.id + '/trainings', { params: {start: this.start, end: this.end}})
            this.fillTrainingsDefault()
            data.forEach( item => {
                const d = moment(item.start).format('d')
                item.start = moment(item.start).format('HH:mm')
                this.trainings[d].push(item)
            })
        },
        async loadAbonements(){
            const {data} = await axios.get('/groups/' + this.group.id + '/abonements', { params: {}})
            this.abonements = data
        }
    }
}
</script>