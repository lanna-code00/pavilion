<template>
    <div>
        
<div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-12">

    <div class="fixed top-0 left-0 w-full bg-blue-500 text-white p-4 shadow-md" v-show="show">
    <span class="float-right cursor-pointer" @click="close">&times;</span>
     <span class="text-center">{{ data }}</span> 
  </div>


    <form class="space-y-6" action="#">
        <h5 class="text-xl font-medium text-gray-900 dark:text-white text-center">Setup a user profile</h5>
        <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
        <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
            <form @submit.prevent="createProfile">
            <dl class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-2 dark:text-white sm:p-8">
               
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                    <input type="text" name="first_name" v-model="form.first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>

                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                    <input type="text" name="last_name"  v-model="form.last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                    <input type="email" name="email"  v-model="form.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>
                <div>
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                    <input type="date" name="dob"  v-model="form.dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>
                <div>
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Profiled</label>
                    <input type="date" name="date_profiled"  v-model="form.date_profiled" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>
                <div>
                    <label for="primary_legal_counsel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primary Legal Counsel</label>
                    <input type="text" name="primary_legal_counsel"  v-model="form.primary_legal_counsel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>
                <div>
                    <label for="case_details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Case Details</label>
                    <textarea type="text" name="case_details"  v-model="form.case_details" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required></textarea>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="profile_image">Profile Image</label>
<input class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="profile_image" type="file" @change="handleFileUpload">
                </div>
             
            </dl>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                
               <span v-show="text">Create Profile</span> 

                <div role="status" v-show="showSpinner">
    <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-green-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
</div>
            </button>
        </form>
            </div>
            </div>
     
       
    </form>
</div>

    </div>
</template>

<script>
   export default {
       name: "CreateUserProfile",
       data(){
        return{
            form: {first_name: '', last_name: '', email: '', dob: '', date_profiled: '', case_details: '', profile_image: '', primary_legal_counsel: ''},
            data: null,
            showSpinner: false,
            text: true,
            show: false
        }
       },

       methods:
       {
        handleFileUpload(event) 
        {
           this.form.profile_image = event.target.files[0];
        },

        close() 
        {
        this.show = false;
        },

          createProfile()
         {
            this.showSpinner = true;
            this.text = false;
            const formData = new FormData();
            formData.append('first_name', this.form.first_name);
            formData.append('last_name', this.form.last_name);
            formData.append('dob', this.form.dob);
            formData.append('date_profiled', this.form.date_profiled);
            formData.append('case_details', this.form.case_details);
            formData.append('email', this.form.email);
            formData.append('primary_legal_counsel', this.form.primary_legal_counsel);
            formData.append('profile_image', this.form.profile_image ?? '');

             axios.post('/api/user', formData).then(response=>{
                this.showSpinner = false;
                   this.text = true;
                   this.show = true;
                    this.data = response.data.message
                }).catch(error=>{
                    this.showSpinner = false;
            this.text = true;

                    this.data = "Server error"
                }) 
         }
       }
   }
</script>