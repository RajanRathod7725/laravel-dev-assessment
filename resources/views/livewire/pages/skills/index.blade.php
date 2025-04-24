<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>
        {{-- TODO: Add table here and a form to create a new skill --}}
        <div class="grid grid-cols-3 gap-6 mt-3">
            <div class="col-span-2">
                <div class="shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only"></span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($skills))
                        @foreach($skills as $skill)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">{{$skill['name']}}</th>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <a href="javascript:;" class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-blue-500" wire:click.prevent="editSkill({{$skill['id']}})">Edit</a>
                                <a href="javascript:;" class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-red-500" wire:click.prevent="deleteSkill({{$skill['id']}})" wire:confirm="Are you sure?">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <tr class="border-b dark:border-gray-700" >
                                <th scope="row" class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white text-center" colspan="2">No skill founds!</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <form class="max-w-sm border p-3 sm:rounded-lg" @if($edit_id>0) wire:submit.prevent="update" @else wire:submit.prevent="save" @endif>
                    <div class="mb-5">
                        <h3 class="mb-4 text-black/70 font-bold">Add new skill</h3>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Name</label>
                        <input type="text" id="name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Skill name" required wire:model="form.name"/>
                    </div>
                    @if($edit_id>0)
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Update</button>
                    @else
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
