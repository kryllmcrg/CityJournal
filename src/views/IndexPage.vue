<template>
    <div>
        <insert />
        <table border="1">
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Gender</th>
                <th>Age</th>
            </tr>
            <tr v-for="info in info">
                <td>{{ info.firstname }}</td>
                <td>{{ info.lastname }}</td>
                <td>{{ info.gender }}</td>
                <th>{{ info.age }}</th>
            </tr>
        </table>
    </div>
</template>

<script>
import insert from '@/components/insert.vue'
import axios from 'axios'
export default{
    components:{
        insert,
    },
    data(){
        return{
            info:[],
        }
    },
    created(){
        this.getInfo();
    },
    methods:{
        async getInfo(){
            try{
            const inf = await axios.get('getData');
            this.info = inf.data;
            } catch (error) {
            console.log(error);
        }
    }
}
}
</script>