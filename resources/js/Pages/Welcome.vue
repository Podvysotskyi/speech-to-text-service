<script setup>
import {Head, Link} from '@inertiajs/vue3'
import {ref} from 'vue'

import Layout from '../Layout/Default.vue'

import {Dialog, DialogPanel} from '@headlessui/vue'
import {Bars3Icon, XMarkIcon} from '@heroicons/vue/24/outline'

const navigation = [
    { name: 'Product', href: '/' },
    { name: 'Features', href: '/features' },
    { name: 'About us', href: '/about' },
]

const mobileMenuOpen = ref(false)

const companyName = "My company"
</script>

<template>
    <Head title="Welcome" />
    <Layout>
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <Link href="/" class="-m-1.5 p-1.5">
                        <span class="sr-only">
                            {{ companyName }}
                        </span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="" />
                    </Link>
                </div>
                <div class="flex lg:hidden">
                    <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400" @click="mobileMenuOpen = true">
                        <span class="sr-only">
                            Open main menu
                        </span>
                        <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <Link v-for="item in navigation" :key="item.name" :href="item.href" class="text-sm font-semibold leading-6 text-white">
                        {{ item.name }}
                    </Link>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <Link href="/login" class="text-sm font-semibold leading-6 text-white">
                        Log in <span aria-hidden="true">&rarr;</span>
                    </Link>
                </div>
            </nav>
            <Dialog as="div" class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
                <div class="fixed inset-0 z-50" />
                <DialogPanel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                    <div class="flex items-center justify-between">
                        <Link href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">
                                {{ companyName }}
                            </span>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="" />
                        </Link>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-400" @click="mobileMenuOpen = false">
                            <span class="sr-only">
                                Close menu
                            </span>
                            <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/25">
                            <div class="space-y-2 py-6">
                                <Link v-for="item in navigation" :key="item.name" :href="item.href" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">
                                    {{ item.name }}
                                </Link>
                            </div>
                            <div class="py-6">
                                <Link href="/login" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white hover:bg-gray-800">
                                    Log in
                                </Link>
                            </div>
                        </div>
                    </div>
                </DialogPanel>
            </Dialog>
        </header>

        <div class="relative isolate overflow-hidden pt-14">
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                        Speech to text
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-300">
                        Turn your voice data into transcripts. Whisper neural network approaches human level robustness and accuracy on English speech recognition.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <Link href="/login" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                            Get started
                        </Link>
                        <Link href="/features" class="text-sm font-semibold leading-6 text-white">
                            Learn more <span aria-hidden="true">→</span>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
