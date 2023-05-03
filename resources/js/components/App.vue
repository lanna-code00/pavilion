<template>
    <div>
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <router-link to="/" class="flex items-center">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">LAW FIRM X</span>
        </router-link>
    </div>
</nav>
<nav class="bg-gray-50 dark:bg-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">
                <li>
                    <router-link to="/" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</router-link>
                </li>
                <li>
                    <router-link to="/create" class="text-gray-900 dark:text-white hover:underline">Create profile</router-link>
                </li>
            </ul>
        </div>
    </div>
</nav>

    </div>
    <router-view></router-view>
</template>

<script>
export default {
    name: "Welcome",

}
</script>