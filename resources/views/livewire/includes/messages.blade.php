@if (session()->has('message'))
    {{-- <div class="bg-{{ session('message-type') == 'danger' ? 'red' : 'green' }}-100 border-{{ session('message-type') == 'danger' ? 'red' : 'green' }}-500 text-{{ session('message-type') == 'danger' ? 'red' : 'green' }}-900 rounded-b border-t-4 px-4 py-3 shadow-md my-3"
        style="border-color: {{ session('message-type') == 'danger' ? 'red' : 'teal' }};
         role="alert">
        <div class="flex">
            <div>
                <p class="text-sm">{!! session('message') !!}</p>
            </div>
        </div>
    </div> --}}
    <div class="flex flex-col justify-center">
        <div class="fixed right-2 bottom-2 bg-{{ session('message-type') == 'danger' ? 'red-600' : 'green-500' }} shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3"
            id="static-example" role="alert" aria-live="assertive">
            <div
                class="bg-{{ session('message-type') == 'danger' ? 'red-600' : 'green-500' }} flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-red-500 rounded-t-lg rounded-b-lg">
                <p class=" text-white flex items-center">
                    {!! session('message') !!}
                </p>
            </div>
        </div>
    </div>
    
@endif
