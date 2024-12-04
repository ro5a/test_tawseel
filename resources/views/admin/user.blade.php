<x-app-layout>

    @if ($do == 'Manage')
        <x-table>
            <x-slot name='tableName'>
                العملاء

            </x-slot>
            <x-slot name='button'>
                <a href="{{ route('users') }}?do=Add" class="row col-9 col-sm-3">
                    <button type="button" class="btn btn-primary text-white p-2 my-3 mx-2 " >
                        اضافه عميل
                    </button>
                </a>

            </x-slot>
            <x-slot name='tableHead'>
                <th> # </th>
                <th> الاسم </th>
                <th> الايميل </th>
                <th>رقم الهاتف </th>
                <th>العمليات</th>
            </x-slot>
            <x-slot name='tableBody'></x-slot>
            <x-slot name='pagination'></x-slot>

        </x-table>
    @elseif ($do == 'Add')
        {{-- Start Add user --}}
        <x-form action="{{ route('add_user') }}">
            <x-slot name='title'> اضافة عميل</x-slot>
            <x-slot name='formInput'>
                <input type="hidden" name="route" value="add">
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username">الاسم</label>
                    <input name="name" value="{{ old('name') }}" type="text" id="multicol-username"
                        class="form-control" />
                    @error('name')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username">رقم الهاتف</label>
                    <input name="phone" value="{{ old('phone') }}" type="text" id="multicol-username"
                        class="form-control" />
                    @error('phone')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username">الايميل</label>
                    <input name="email" value="{{ old('email') }}" type="text" id="multicol-username"
                        class="form-control" />
                    @error('email')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username">كلمة المرور</label>
                    <input name="password" type="password" id="multicol-username" class="form-control" />
                    @error('password')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username">تاكيد كلمة المرور</label>
                    <input name="confirm_password" type="password" id="multicol-username" class="form-control" />
                    @error('confirm_password')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
            </x-slot>
            <x-slot name='action'>اضافة</x-slot>
            <x-slot name='route'>{{ route('users') }}</x-slot>
        </x-form>
        {{-- End Add user --}}
    @elseif ($do == 'Edit')
        {{-- Start Edit user --}}
        <x-form action="{{ route('update_user', $user->id) }}">
            <x-slot name='title'> تعديل معلومات العميل</x-slot>
            <x-slot name='formInput'>

                <input type="hidden" name="route" value="update">
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username">الاسم</label>
                    <input name="name" value="{{ $user->name }}" type="text" id="multicol-username"
                        class="form-control" />
                    @error('name')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username">رقم الهاتف</label>
                    <input name="phone" value="{{ $user->phone }}" type="text" id="multicol-username"
                        class="form-control" />
                    @error('phone')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username">الايميل</label>
                    <input name="email" value="{{ $user->email }}" type="text" id="multicol-username"
                        class="form-control" />
                    @error('email')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username"> كلمة المرور</label>
                    <input name="password" type="password" id="multicol-username" class="form-control" />
                    @error('password')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username"> تاكيد كلمة المرور</label>
                    <input name="confirm_password" type="password" id="multicol-username" class="form-control" />
                    @error('confirm_password')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
            </x-slot>
            <x-slot name='action'>تعديل</x-slot>
            <x-slot name='route'>{{ route('users') }}</x-slot>
        </x-form>
        {{-- End Edit user --}}
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
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            mRender: function(data, type, row) {
                                var content = data ? data : 'لايوجد';
                                return content;
                            }
                        },


                        {
                            data: null,
                            render: function(data, type, row) {

                                return `

                        <a href="${"{{ route('users') }}"}?do=Edit&Id=${ data.id }" class="btn btn-icon btn-outline-success mx-1">
                            <i class="tf-icons bx bx-edit-alt me-1"></i>
                        </a>
                        <a class="btn btn-icon btn-outline-dribbble text-danger" onclick='modal("delete",${data.id})'>
                            <i class="tf-icons bx bx-trash me-1"></i>
                        </a>`
                            }
                        }
                    ],
                    order: [
                        [0, "desc"]
                    ],
                    displayLength: 7,
                    lengthMenu: [7, 10, 25, 50, 75, 100],
                });
            });



            function modal(name, id) {
                 if (name == 'delete') {
                    var url = '{{ route('delete_user', ':id') }}';
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
