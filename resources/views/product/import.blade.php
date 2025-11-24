<x-layouts.app>
    <div class="flex-1">
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-6 inline-flex">
                <form id="import" class="inline-flex" enctype="multipart/form-data">
                    @csrf
                    <x-forms.input class="px-2 mx-2" label="File" name="file" type="file" value=""
                        labelClass="py-2 mx-2" />
                </form>
                <x-button id="upload" class="mx-2" type="primary">{{ __('Upload') }}</x-button>
                <a class="text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors flex items-center justify-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 mx-2"
                    href="/import.csv" download class="mx-2">{{ __('Sample') }}</a>
                <div id="loader" class="loader" hidden></div>
            </div>
            <div class="p-6 inline-flex">
            </div>
        </div>
    </div>
    <div class="flex">
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6">
                test area
                <div id="rdtbl">
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#upload").click((e) => {
            e.preventDefault();
            var form = $("#import");
            $("#upload").prop('disabled',true);
            $("#upload").removeClass('bg-blue-600');
            $("#upload").addClass('bg-blue-900');
            $("#loader").prop('hidden',false);
            $.ajax({
                type: 'post',
                dataType: 'JSON',
                data: new FormData(form[0]),
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    iziToast.info({
                        title:"Success",
                        message:data
                    });
                    $("#upload").prop('disabled',false);
                    $("#upload").removeClass('bg-blue-900');
                    $("#upload").addClass('bg-blue-600');
                    $("#loader").prop('hidden',true);
                },
                error: (data) => {
                    iziToast.info({
                        title:"Error",
                        message:data
                    });
                    $("#upload").prop('disabled',false);
                    $("#upload").removeClass('bg-blue-900');
                    $("#upload").addClass('bg-blue-600');
                    $("#loader").prop('hidden',true);
                }
            });
        });
        var table = new Tabulator("#rdtbl", {
            ajaxURL: "/product_list",
            ajaxConfig:{
                method:"POST",
                headers:{
                    "X-CSRF-TOKEN":"{{csrf_token()}}",
                }
            },
            ajaxContentType:"json",
            autoColumns: true,
            pagination:true,
            paginationMode:"remote",
            layout:"fitColumns"
        });
    </script>
</x-layouts.app>
