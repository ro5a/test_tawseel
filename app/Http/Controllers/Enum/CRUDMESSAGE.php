<?php

namespace App\Http\Controllers\Enum;

use App\Http\Controllers\Controller;

class CRUDMESSAGE extends Controller
{
    const MESSAGE_ADD_SUCCESS = 'تمت الاضافة  بنجاح';

    const MESSAGE_ADD_ERROR = 'حدث خطأ في عملية الاضافة ';

    const MESSAGE_UPDATE_SUCCESS = 'تم التعديل  بنجاح';

    const MESSAGE_UPDATE_ERROR = 'حدث خطأ في عملية التعديل ';

    const MESSAGE_ACTIVE_SUCCESS = 'تم تغيير الحالة بنجاح';

    const MESSAGE_ACTIVE_ERROR = ' حدث خطا لم تتم العملية ';

    const MESSAGE_DELETE_SUCCESS = 'تمت عملية الحذف بنجاح';

    const MESSAGE_DELETE_ERROR = ' حدث خطا لم يتم حذف العنصر ';

    const MESSAGE_REGISTER_SUCCESS = ' تمت عملية انشاء الحساب بنجاح';

    const MESSAGE_REGISTER_ERROR = ' حدث خطا لم يتم  حفظ البيانات ';

    const MESSAGE_LOGIN_SUCCESS = ' تمت عملية  تسجيل الدخول بنجاح';

    const MESSAGE_LOGIN_ERROR = ' حدث خطا تأكد من صحة البيانات ';
}
