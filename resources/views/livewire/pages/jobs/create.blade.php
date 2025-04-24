<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Create new job posting</h1>
        </div>
        {{-- TODO: Add form here --}}
        <form class="" wire:submit.prevent="save">
            <div class="grid grid-cols-3 gap-6 mt-3">
                <div class="col-span-2">
                    <div class="mb-5 border sm:rounded-lg p-3">
                        <h3 class="mb-4 text-black/70 font-bold">Job Detail</h3>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Title</label>
                        <input type="text" id="title" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3" placeholder="Company name" required wire:model="form.title"/>

                        <label for="description" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Description</label>
                        <textarea id="description" name="description" placeholder="Job posting description" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3" required wire:model="form.description"></textarea>

                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label for="experience" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Experience</label>
                                <input type="text" id="experience" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-1" placeholder="Eg. 1-3 Years" required wire:model="form.experience"/>
                            </div>
                            <div>
                                <label for="salary" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Salary</label>
                                <input type="text" id="salary" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-1" placeholder="Eg. 2.5 -5 Lacs PA" required wire:model="form.salary"/>
                            </div>

                            <div>
                                <label for="location" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Location</label>
                                <input type="text" id="location" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-1" placeholder="Eg. Remote/Pune" required wire:model="form.location"/>
                            </div>

                            <div>
                                <label for="extra_info" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Extra Info</label>
                                <input type="text" id="extra_info" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Eg. Full time/Part time/Urgent/Flexible" required wire:model="form.extra_info"/>
                                <i class="text-sm">Please use coma separated values</i>
                            </div>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-5 border sm:rounded-lg p-3">
                        <h3 class="mb-4 text-black/70 font-bold">Company Detail</h3>
                        <label for="company_name" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Name</label>
                        <input type="text" id="company_name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3" placeholder="Company name" required wire:model="form.company_name"/>

                        <label for="company_logo" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Logo</label>
                        <input type="file" id="company_logo" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="form.company_logo"/>
                    </div>

                    <div class="mb-5 border sm:rounded-lg p-3">
                        <h3 class="mb-4 text-black/70 font-bold">Skills</h3>
                        <label for="skills" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Name</label>
                        <select name="skills" id="skills" multiple class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required wire:model="form.skills">
                            @foreach($skills as $skill)
                            <option value="{{$skill->name}}">{{$skill->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </form>
    </div>
</div>
