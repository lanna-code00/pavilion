<template>
    <div> 
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-12">
            <div class="mb-4 flex flex-col items-center pb-10 mt-6">
                <label class="block text-gray-700 font-bold mb-2" for="checkbox">
                    Enable Editing
                </label>
                <input class="form-checkbox h-5 w-5 text-gray-600" id="checkbox" type="checkbox" v-model="isDisabled" />
            </div>
            
            <!-- form -->
            <form @submit.prevent="updateProfile">
            <div class="flex flex-col items-center pb-10 mt-6">
                <img v-if="!isDisabled" class="w-24 h-24 mb-3 rounded-full shadow-lg cursor-pointer" :src="user.profile_image ?? `https://p.kindpng.com/picc/s/22-224091_avatar-computer-icons-blog-clip-art-avatar-png.png`" alt="Bonnie image" @click="selectImage">
                <img v-else class="w-24 h-24 mb-3 rounded-full shadow-lg" :src="user.profile_image ?? `https://p.kindpng.com/picc/s/22-224091_avatar-computer-icons-blog-clip-art-avatar-png.png`" alt="Bonnie image">
                <p v-if="imageName">You selected: {{ imageName }}</p>
                <p v-else hidden>You selected: {{ imageName }}</p>

        <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
            <dl class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-2 dark:text-white sm:p-8">
                <div class="flex flex-col items-center justify-center">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                    <input type="text" name="first_name" v-model="user.first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" :readonly="isDisabled">
                </div>
                <div class="flex flex-col items-center justify-center">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                    <input type="text" name="last_name" v-model="user.last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" :readonly="isDisabled">
                </div>
            </dl>
        </div>

            <dl class="grid max-w-screen-xl grid-cols-1 mx-auto text-gray-900 sm:grid-cols-1 xl:grid-cols-1 dark:text-white ">
                <div class="flex flex-col items-center justify-center">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                    <input type="text" name="email" v-model="user.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" :readonly="isDisabled">
                </div>
             
            </dl>

        <!-- <span class="text-sm text-gray-500 dark:text-gray-400">{{ user.email }}</span> -->
    </div>

    
<div class="w-full bg-white  shadow dark:bg-gray-800 dark:border-gray-700">

    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
        <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
            <dl class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-2 dark:text-white sm:p-8">
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-xl font-extrabold">Date Of Birth</dt>
                    <input type="date" name="dob"  v-model="formattedDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" :readonly="isDisabled">
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-xl font-extrabold">Date Profiled</dt>
                    <dd class="text-gray-500 dark:text-gray-400">{{ user.created_at }}</dd>
                </div>
             
            </dl>


            <dl class="grid max-w-screen-xl grid-cols-1 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-1 xl:grid-cols-1 dark:text-white sm:p-8">
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-xl font-extrabold">Primary Legal Counsel</dt>
                    <input type="text" v-model="user.primary_legal_counsel" aria-label="disabled input" class="mb-3 rounded-lg bg-gray-100 text-center block w-full p-2.5" :readonly="isDisabled">
                </div>
             
            </dl>

            <dl class="grid max-w-screen-xl grid-cols-1 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-1 xl:grid-cols-1 dark:text-white sm:p-8">

                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-xl font-extrabold">Case Details</dt>
                   
<textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg text-center" v-model="user.case_details" :readonly="isDisabled"></textarea>

      
<!-- submit button -->

             <button v-if="!isDisabled" type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-7">
                
                <span v-show="text">Update Profile</span> 
 
                 <div role="status" v-show="showSpinner">
     <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-green-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
         <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
     </svg>
 </div>
             </button>

             <button v-else hidden>
             </button>

             <!-- submit button ends -->

                </div>
             
            </dl>

        </div>
    </div>
</div>

</form>
<!-- Form ends -->


</div>

    </div>
</template>

<script>
export default{
    name: 'ViewUser',
    data(){
        return {
            user: {},
            isDisabled: true,
            data: null,
            showSpinner: false,
            text: true,
            show: false,
            imageName: ''
        }
    },

    mounted()
    {
        this.ViewUser()
    },

    computed: {
        isReadOnly() { //
            return this.isDisabled ? 'readonly' : null
        },
        formattedDate() {
            if (!this.user.dob) return null
            const date = new Date(this.user.dob)
            const year = date.getFullYear()
            const month = String(date.getMonth() + 1).padStart(2, '0')
            const day = String(date.getDate()).padStart(2, '0')
            return `${year}-${month}-${day}`
    }
  },

    methods: 
    {
        async ViewUser()
        {
            await axios.get(`/api/user/fetch-user/${this.$route.params.id}`).then(response=>{
                this.user = response.data.data
            }).catch(error=>{
                this.user = {}
            })
        },

        selectImage() {
            const input = document.createElement('input')
            input.type = 'file'
            input.accept = 'image/*'
            input.onchange = (event) => {
                this.user.profile_image = event.target.files[0];
                this.imageName = event.target.files[0]?.name
            }
            input.click()
        },

        updateProfile()
         {
            this.showSpinner = true;
            this.text = false;
            const formData = new FormData();
            formData.append('first_name', this.user.first_name);
            formData.append('last_name', this.user.last_name);
            formData.append('dob', this.user.dob);
            formData.append('case_details', this.user.case_details);
            formData.append('email', this.user.email);
            formData.append('primary_legal_counsel', this.user.primary_legal_counsel);
            formData.append('profile_image', this.user.profile_image ?? '');

             axios.post(`/api/user/${this.$route.params.id}`, formData).then(response=>{
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