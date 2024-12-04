<x-app-layout>

    @if ($do == 'Manage')
        <x-table>
            <x-slot name='tableName'>
                    طلبات
            </x-slot>
            <x-slot name='button'>
                <a href="{{ route('orders') }}?do=Add" class="row col-9 col-sm-3">
                    <button type="button" class="btn btn-primary text-white p-2 my-3 mx-2 ">
                        اضافه طلب
                    </button>
                </a>
            </x-slot>
            <x-slot name='tableHead'>
                <th> رقم الطلب </th>
                <th> اسم المستخدم </th>
                <th> اسم المنتج </th>
                <th>  الكمية </th>
                <th> حالة الطلب</th>
            </x-slot>
            <x-slot name='tableBody'>
            </x-slot>
            <x-slot name='pagination'></x-slot>
        </x-table>
    @elseif ($do == 'Add')
    <x-form action="{{ route('add_order') }}" >
        <x-slot name='title'> اضافة طلب</x-slot>
        <x-slot name='formInput'>
            <x-select>
                <x-slot name="label_name">المنتج</x-slot>
                <x-slot name="field_name">product_id</x-slot>
                <x-slot name="options">
                    <option value="">اختر منتج</option>
                    @foreach ($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }}</option>
                    @endforeach
                </x-slot>
            </x-select>
            <x-select>
                <x-slot name="label_name">المنتج</x-slot>
                <x-slot name="field_name">user_id</x-slot>
                <x-slot name="options">
                    <option value="">اختر مستخدم</option>
                    @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}</option>
                    @endforeach
                </x-slot>
            </x-select>
            <div class="col-md-6 my-3">
                <label class="form-label fs-6" for="multicol-categoriesname">الكمية </label>
                <input name="quantity" value="{{ old('quantity') }}" type="text" id="multicol-categoriesname"
                    class="form-control" />
                @error('quantity')
                    <span class="text-end text-danger">* {{ $message }} </span>
                @enderror
            </div>

        </x-slot>
        <x-slot name='action'>اضافة</x-slot>
        <x-slot name='route'>{{ route('categories') }}</x-slot>
    </x-form>

    @endif

    @push('scripts')
        <script>
            $(document).ready(function() {

                var table = $('#datatable').DataTable({
                    data: {!! $data !!},
                    order: [
                        [0, "desc"]
                    ], // Pass the data fetched in the controller
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return data.user.name;
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return data.product.name;
                            }
                        },
                        {
                            data: 'quantity',
                            name: 'quantity'
                        },

                        {
                            data: null,
                            render: function(data, type, row) {
                                var icon;
                                var color;
                                if (data.status == 'قيد المراجعة') {
                                    color = 'warning';
                                    icon = 'قيد المراجعة';
                                } else if (data.status == 'قيد التحضير') {
                                    color = 'primary';
                                    icon = 'قيد التحضير';
                                } else if (data.status == 'في الطريق إليك') {
                                    color = 'secondary';
                                    icon = 'في الطريق إليك';

                                } else if (data.status == 'تم الإلغاء') {
                                    color = 'danger';
                                    icon = 'تم الإلغاء';
                                    return ` <a class="btn btn-${color} mx-1 text-white" >
                                              ${icon}
                                            </a>`;
                                } else if (data.status == 'تم التسليم') {
                                    color = 'success';
                                    icon = 'تم التسليم';

                                } else {
                                    color = 'default';
                                    icon = 'لايوجد';
                                }

                                return `
                                            <a class="btn btn-${color} m-1 text-white">
                                              ${icon}
                                            </a>

                                                `;

                            }
                        },

                    ],
                    columnDefs: [{
                        "targets":  '[]', // Replace with the index of the column you want to remove
                        "visible": false,
                    }],
                });
            });


        </script>
    @endpush
</x-app-layout>
