<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Upload Research Project
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('research.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Project Name</label>
                        <input type="text" name="project_name" class="w-full border-gray-300 rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Members</label>
                        <input type="text" name="members" class="w-full border-gray-300 rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Department</label>
                        <select name="department" class="w-full border-gray-300 rounded-lg" required>
                            <option value="Engineering">Engineering</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Business">Business</option>
                            <option value="Education">Education</option>
                            <option value="Medicine">Medicine</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Abstract</label>
                        <textarea name="abstract" class="w-full border-gray-300 rounded-lg" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Banner Image</label>
                        <input type="file" name="banner_image" class="w-full border-gray-300 rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Upload File (PDF, DOCX, etc.)</label>
                        <input type="file" name="file" class="w-full border-gray-300 rounded-lg" required>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Submit</button>

                    <!-- "My Archives" Button -->
                    <a href="{{ route('research.history') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                        My Archives
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
