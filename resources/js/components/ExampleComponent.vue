<template>
    <div class="container">
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg pb-4">
      <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-12">
        <input type="text" v-model="searchTerm" @input="serachUsers" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm flex flex-col w-full rounded-lg items-center p-3 mb-5" placeholder="Search by first name, last name and email...">
        
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    S/N
                </th>
                <th scope="col" class="px-6 py-3">
                    Full Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Name
                </th>
                <th scope="col" class="px-6 py-3">
                    E-mail
                </th>
                <th scope="col" class="px-6 py-3">
                    Profile Picture
                </th>
                <th scope="col" class="px-6 py-3">
                    Date of Birth
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody v-if="users.length > 0">
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700" v-for="(user,index) in users" :key="index" >
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ index+1 }} 
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ user.first_name }} 
                </th>
                <td class="px-6 py-4">
                    {{ user.last_name }}
                </td>
                <td class="px-6 py-4">
                    {{ user.email }}
                </td>
                <td class="px-6 py-4 h-32 w-32">
                    <img :src="user.profile_image ?? `https://p.kindpng.com/picc/s/22-224091_avatar-computer-icons-blog-clip-art-avatar-png.png`" class="rounded-full p-1 rounded-lg max-w-[16rem]" style="width: 40px; height: 40px;"/>
                </td>
                <td class="px-6 py-4">
                    {{ user.dob }}
                </td>
                <td>
                    <router-link :to='{name:"view",params:{id:user.id}}' class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent roundedtn btn-danger">View</router-link>
                </td>
            </tr>
        </tbody>
        <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">Users Not Yet Profiled</td>
                                </tr>
                            </tbody>
    </table>
</div>

    </div>
</template>

<script>
    export default {
        name: "ExampleComponent",
        data(){
            return {
                users: [],
                user: {},
                searchTerm: ''
            }
        },

        mounted() 
        {
            this.getUsers()
        },

        methods: 
        {
            async getUsers()
            {
                await axios.get('/api/user').then(response=>{
                    this.users = response.data.data
                    console.log(this.users);
                }).catch(error=>{
                    console.log(error)
                    this.users = []
                })
           },

           async serachUsers()
            {
                await axios.get(`/api/user?search_type=${this.searchTerm}`).then(response=>{
                    this.users = response.data.data
                    console.log(this.users);
                }).catch(error=>{
                    console.log(error)
                    this.users = []
                })
           },

  
        },

    }
</script>
