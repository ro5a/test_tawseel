<x-app-layout>

    @if ($do == 'Manage')
        <x-table>
            <x-slot name='tableName'> عرض المنتجات</x-slot>
            <x-slot name='button'>
                <a href="{{ route('products', $category_id) }}?do=Add" class="row col-9 col-sm-3">
                    <button type="button" class="btn btn-primary text-white p-2 my-3 mx-2 ">
                        اضافه منتج
                    </button>
                </a>
                <select id="categoryFilter" name="category_id" class="form-control">
                    <option value="">الكل </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </x-slot>
            <x-slot name='tableHead'>
                <th> #</th>
                <th> الصورة </th>
                <th> الاسم</th>
                <th>السعر</th>
                <th>كمية المخزون</th>
                <th>القسم</th>
                <th>العمليات</th>
            </x-slot>
            <x-slot name='tableBody'>
            </x-slot>
            <x-slot name='pagination'></x-slot>
        </x-table>
        <!-- End Show products Content -->
    @elseif ($do == 'Add')
        {{-- Start Add products --}}
        <x-form action="{{ route('add_product') }}">
            <x-slot name='title'> اضافة منتج</x-slot>
            <x-slot name='formInput'>
                <x-input value="{{ old('name') }}">
                    <x-slot name="label_name">الاسم </x-slot>
                    <x-slot name="field_name">name</x-slot>
                </x-input>
                <x-input value="{{ old('price') }}">
                    <x-slot name="label_name">السعر </x-slot>
                    <x-slot name="field_name">price</x-slot>
                </x-input>
                <x-input value="{{ old('quantity') }}">
                    <x-slot name="label_name">الكمية </x-slot>
                    <x-slot name="field_name">quantity</x-slot>
                </x-input>
                <x-select>
                    <x-slot name="label_name">القسم</x-slot>
                    <x-slot name="field_name">category_id</x-slot>
                    <x-slot name="options">
                        <option value="">اختر قسم</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </x-slot>
                </x-select>
                <x-textarea>
                    <x-slot name="label_name"> تفاصيل </x-slot>
                    <x-slot name="field_name">description</x-slot>
                    <x-slot name="value">{{ old('description') }}</x-slot>
                </x-textarea>
                <x-image oninput="previewMainImage.src=window.URL.createObjectURL(this.files[0])">
                    <x-slot name="label_name">صورة المنتج</x-slot>
                    <x-slot name="field_name">image</x-slot>
                    <x-slot name="preview_id">previewMainImage </x-slot>
                    <x-slot name="src"></x-slot>
                </x-image>
            </x-slot>
            <x-slot name='action'>اضافة</x-slot>
            <x-slot name='route'>{{ route('products') }}</x-slot>
        </x-form>
        {{-- End Add products --}}
    @elseif ($do == 'Edit')
        {{-- Start Add products --}}
        <x-form action="{{ route('update_product', $product->id) }}">
            <x-slot name='title'> تعديل المنتج

            </x-slot>
            <x-slot name='formInput'>
                <x-input value="{{ $product->name }}">
                    <x-slot name="label_name">الاسم </x-slot>
                    <x-slot name="field_name">name</x-slot>
                </x-input>
                <x-input value="{{ $product->price }}">
                    <x-slot name="label_name">السعر </x-slot>
                    <x-slot name="field_name">price</x-slot>
                </x-input>
                <x-input value="{{ $product->quantity }}">
                    <x-slot name="label_name">الكمية </x-slot>
                    <x-slot name="field_name">quantity</x-slot>
                </x-input>
                <x-select>
                    <x-slot name="label_name">القسم</x-slot>
                    <x-slot name="field_name">category_id</x-slot>
                    <x-slot name="options">
                        @foreach ($categories as $category)
                            <option value='{{ $category->id }}'
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </x-slot>
                </x-select>
                <x-textarea>
                    <x-slot name="label_name"> تفاصيل </x-slot>
                    <x-slot name="field_name">description</x-slot>
                    <x-slot name="value">
                        @if (isset($product->description))
                            {{ $product->description }}
                        @endif
                    </x-slot>
                </x-textarea>
                <x-image oninput="previewMainImage.src=window.URL.createObjectURL(this.files[0])">
                    <x-slot name="label_name">صورة المنتج</x-slot>
                    <x-slot name="field_name">image</x-slot>
                    <x-slot name="preview_id">previewMainImage </x-slot>
                    <x-slot name="src">
                        @if ($product->media != null)
                            @php
                                $data = $product->media;
                            @endphp
                            {{ $data->thumb_url }}
                        @endif
                    </x-slot>
                </x-image>
            </x-slot>
            <x-slot name='action'>تعديل</x-slot>
            <x-slot name='route'>{{ route('products') }}</x-slot>
        </x-form>
        {{-- End Add products --}}
    @endif
    @push('scripts')
        {{-- <script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript"></script>
        <script>
            config.extraPlugins = 'markdown'; // add this plugin
            CKEDITOR.replace('description', {
                extraPlugins: 'markdown',
            });
        </script> --}}
        <script>
            var table;
            categoryFilter
            $(document).ready(function() {
                table = $('#datatable').DataTable({
                    ajax: {
                        url: '{{ route('products') }}',

                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                if (data.media != null) {
                                    var data_image = data.media;
                                    return `<img class="img-fluid rounded" height="60px" width="60px"
                                src="${data_image.thumb_url}">`;
                                } else
                                    return `<p>لايوجد صورة</p>`;
                            }
                        },
                        {
                            data: 'name',
                            name: 'name',
                        },
                        {
                            data: 'price',
                            name: 'price',
                        },
                        {
                            data: 'quantity',
                            name: 'quantity',
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return data.category ? data.category.name : 'لا يوجد';
                            },
                        },
                        {
                            data: null,
                            render: function(data, type, row) {

                                return `
                            <a href="${"{{ route('products') }}"}?do=Edit&Id=${ data.id }" class="btn btn-icon btn-outline-success mx-1">
                                <i class="tf-icons bx bx-edit-alt me-1"></i>
                            </a>
                            <a class="btn btn-icon btn-outline-dribbble text-danger" onclick='modal("delete",${data.id})'>
                                <i class="tf-icons bx bx-trash me-1"></i>
                            </a>`;
                            }
                        }
                    ],
                });
            });
            $('#categoryFilter').on('change', function() {
                var category_id = $('#categoryFilter').val();
                var url = '{{ route('products') }}?category_id=' + category_id;
                table.ajax.url(url).load();
            });

            function modal(name, id) {
                if (name == 'delete') {
                    var url = '{{ route('delete_product', ':id') }}';
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
