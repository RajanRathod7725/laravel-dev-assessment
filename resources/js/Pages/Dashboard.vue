<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Icon from '@/Components/Icon.vue';
import dayjs from 'dayjs'
import relativeTime from 'dayjs/plugin/relativeTime';
dayjs.extend(relativeTime);

import { defineProps } from "vue";
defineProps({jobs : Object});
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Hero -->
        <Hero />
        <!-- Job List -->
        <div class="bg-white">
            <div class="container py-5">
                <!-- TODO: Add job list here -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow flex flex-col gap-3" v-for="(job, index) in jobs">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-green-200 flex items-center justify-center">
                                <span class="text-2xl font-bold text-green-700"><img :src="'storage/company_logo/'+job.company_logo"></span>
                            </div>
                            <div>
                                <h2 class="font-semibold text-lg">{{ job.title }}</h2>
                                <p class="text-gray-500 text-sm">{{ job.company_name }}</p>
                            </div>
                            <div class="ml-auto flex gap-2">
                                <span class="bg-gray-200 text-xs px-2 py-1 rounded" v-for="(extra_info, index) in job.extra_info.split(',')">{{ extra_info }}</span>
                            </div>
                        </div>
                        <div class="text-sm text-gray-600 flex items-center space-x-2">
                            <div class="flex items-center gap-1">
                                <Icon name="briefcase"/>
                                <span>{{ job.experience }}</span>
                            </div>

                            <span class="text-gray-300">|</span>

                            <div class="flex items-center gap-1">
                                <Icon name="rupee"/>
                                <span>{{ job.salary }}</span>
                            </div>

                            <span class="text-gray-300">|</span>

                            <div class="flex items-center gap-1">
                                <Icon name="location"/>
                                <span>{{ job.location }}</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700">
                            {{job.description }}
                        </p>
                        <div class="flex flex-wrap gap-2 text-xs text-gray-600 mt-2">
                            <span class="bg-gray-100 px-2 py-1 rounded" v-for="(skill, index) in job.skills.split(',')">{{ skill }}</span>
                        </div>
                        <p class="text-xs text-right text-gray-400">{{ dayjs(job.created_at).fromNow() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
