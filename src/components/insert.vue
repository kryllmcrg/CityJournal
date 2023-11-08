<template>
    <div>
        <form @submit.prevent="save">
            <label for="firstname">FirstName</label>
            <input type="text" placeholder="firstname" v-model="firstname">
            <br>
            <label for="firstname">LastName</label>
            <input type="text" placeholder="lastname" v-model="lastname">
            <br>
            <label for="firstname">Gender</label>
            <input type="text" placeholder="gender" v-model="gender">
            <br>
            <label for="firstname">Age</label>
            <input type="text" placeholder="age" v-model="age">
            <br>
            <button type="submit">submit</button>
        </form>
    </div>
</template>

<script>
export default{
    data(){
        return{
            firstname:"",
            lastname:"",
            gender:"",
            age:"",
        }
    },
    methods:{
        async save(){
            try{
                const ins = await axios.post("save",{
                    firstname: this.firstname,
                    lastname: this.lastname,
                    gender: this.gender,
                    age: this.age,
                });
            } catch (error){

            }
        }
    }
}
</script>