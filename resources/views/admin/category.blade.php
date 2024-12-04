<x-app-layout>

    @if ($do == 'Manage')
        <x-table>
            <x-slot name='tableName'> عرض الاقسام</x-slot>
            <x-slot name='button'>
                <a href="{{ route('categories') }}?do=Add" class="row col-9 col-sm-3">
                    <button type="button" class="btn btn-primary text-white p-2 my-3 mx-2 ">
                        اضافة قسم
                    </button>
                </a>
            </x-slot>
            <x-slot name='tableHead'>
                <th> #</th>
                <th> الاسم </th>
                <th> المنتجات </th>
                <th>العمليات</th>
            </x-slot>
            <x-slot name='tableBody'>
            </x-slot>
            <x-slot name='pagination'></x-slot>
        </x-table>
    @elseif ($do == 'Add')
        {{-- Start Add categories --}}
        <x-form action="{{ route('add_category') }}">
            <x-slot name='title'> اضافة قسم</x-slot>
            <x-slot name='formInput'>
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-categoriesname">الاسم </label>
                    <input name="name" value="{{ old('name') }}" type="text" id="multicol-categoriesname"
                        class="form-control" />
                    @error('name')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

            </x-slot>
            <x-slot name='action'>اضافة</x-slot>
            <x-slot name='route'>{{ route('categories') }}</x-slot>
        </x-form>
        {{-- End Add categories --}}
    @elseif ($do == 'Edit')
        {{-- Start Edit categories --}}
        <x-form action="{{ route('update_category', $category->id) }}">
            <x-slot name='title'> تعديل معلومات القسم</x-slot>
            <x-slot name='formInput'>
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-categoriesname">الاسم </label>
                    <input name="name" value="{{ $category->name }}" type="text" id="multicol-categoryname"
                        class="form-control" />
                    @error('name')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>


            </x-slot>
            <x-slot name='action'>تعديل</x-slot>
            <x-slot name='route'>{{ route('categories') }}</x-slot>
        </x-form>
        {{-- End Edit category --}}
    @endif
    @push('scripts')
        <script>
            $(document).ready(function() {

                var table = $('#datatable').DataTable({
                    data: {!! $data !!},
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },

                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                var url = '{{ route('products', ':id') }}';
                                url = url.replace(':id', data.id);
                                return ` </a>
                                    <a href="${url}" class=" text-info mx-1">  المنتجات
                                </a>`;
                            },
                        },

                        {
                            data: null,
                            render: function(data, type, row) {

                                return `

                        <a href="categories?do=Edit&Id=${ data.id }" class="btn btn-icon btn-outline-success mx-1">
                            <i class="tf-icons bx bx-edit-alt me-1"></i>
                        </a>
                        <a class="btn btn-icon btn-outline-dribbble text-danger" onclick='modal("delete",${data.id})'>
                            <i class="tf-icons bx bx-trash me-1"></i>
                        </a>`
                            }
                        }
                    ],
                    columnDefs: [{
                        "targets": [],
                        "visible": false,
                    }],
                });
            });



            function modal(name, id) {
                if (name == 'delete') {
                    var url = '{{ route('delete_category', ':id') }}';
                    url = url.replace(':id', id);
                    var data = ['حذف البيانات', 'هل انت متاكد انك تريد حذف البيانات', url, 'حذف البيانات'];
                }
                $('#content_modal').html(`
                <x-drop-modal id='modal'>
                    <x-slot name='title'>${data[0]}</x-slot>
                    <x-slot name='message'>${data[1]}</x-slot>
                    <x-slot name='link'>${data[2]}</x-slot>
                    <x-slot name='action'>
                        <button type="button" class="btn btn-danger">${data[3]}</button>
                    </x-slot>
                </x-drop-modal>
            `);
                $('#modal').modal('show');
            }
        </script>
    @endpush
</x-app-layout>
