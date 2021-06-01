<img src="data:image/png;base64,
{!!
base64_encode(QrCode::format('png')->merge(public_path('laravel.PNG'), 0.3, true)->size(100)->generate('stock'))
!!} "
>

{!!
QrCode::email('foo@bar.com', 'This is the subject.', 'This is the message body.');
!!} "
