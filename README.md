# بلاکچین ساده به زبان PHP

این پروژه یک بلاکچین ساده به زبان PHP را پیاده‌سازی می‌کند. هدف این پروژه ارائه درکی از اصول پایه‌ای بلاکچین مانند بلاک‌ها، تراکنش‌ها و الگوریتم اثبات کار است.

## ویژگی‌ها

- **ساخت بلاک و زنجیره**: اضافه کردن بلاک‌های جدید به زنجیره.
- **تراکنش‌ها**: اضافه کردن تراکنش‌های جدید.
- **اثبات کار**: الگوریتم اثبات کار ساده برای استخراج بلاک‌های جدید.
- **API‌های وب**: برای تعامل با بلاکچین از طریق HTTP.

## نصب و راه‌اندازی

برای اجرای این پروژه، نیاز به یک سرور محلی PHP مانند [XAMPP](https://www.apachefriends.org/index.html) یا [WAMP](https://www.wampserver.com/en/) دارید.

### مراحل نصب

1. **دانلود و نصب سرور PHP**:
   - [XAMPP](https://www.apachefriends.org/index.html) یا [WAMP](https://www.wampserver.com/en/) را دانلود و نصب کنید.

2. **کپی کردن فایل‌ها**:
   - این فایل‌ها را در پوشه `htdocs` (برای XAMPP) یا `www` (برای WAMP) قرار دهید.

3. **اجرای سرور**:
   - سرور Apache را از کنترل پنل XAMPP یا WAMP اجرا کنید.

4. **دسترسی به پروژه**:
   - مرورگر وب خود را باز کرده و به آدرس `http://localhost/[نام‌پوشه‌پروژه]` بروید.

## استفاده

### استخراج بلاک جدید

برای استخراج یک بلاک جدید و اضافه کردن آن به زنجیره، به آدرس زیر بروید:
http://localhost/[نام‌پوشه‌پروژه]/mine


### اضافه کردن تراکنش جدید

برای اضافه کردن تراکنش جدید به زنجیره، یک درخواست POST به آدرس زیر ارسال کنید:


http://localhost/[نام‌پوشه‌پروژه]/transactions/new


### پارامترهای درخواست POST

بدنه درخواست باید به صورت JSON و شامل فیلدهای زیر باشد:

```json
{
    "sender": "آدرس‌فرستنده",
    "recipient": "آدرس‌دریافت‌کننده",
    "amount": "مقدار"
}

مشاهده زنجیره کامل
برای مشاهده زنجیره کامل بلاکچین، به آدرس زیر بروید:
http://localhost/[نام‌پوشه‌پروژه]/chain

مثال‌ها
استخراج بلاک جدید
برای استخراج یک بلاک جدید و دریافت اطلاعات آن، به آدرس زیر بروید:
http://localhost/[نام‌پوشه‌پروژه]/mine


اضافه کردن تراکنش جدید
برای اضافه کردن تراکنش جدید، از ابزارهایی مانند Postman یا cURL استفاده کنید. برای مثال، با cURL:


curl -X POST http://localhost/[نام‌پوشه‌پروژه]/transactions/new -H "Content-Type: application/json" -d '{"sender": "آدرس‌فرستنده", "recipient": "آدرس‌دریافت‌کننده", "amount": 10}'


مشاهده زنجیره کامل
برای مشاهده زنجیره، به آدرس زیر بروید:
http://localhost/[نام‌پوشه‌پروژه]/chain


توضیحات
این پروژه به عنوان یک نمونه آموزشی برای درک اصول پایه‌ای بلاکچین طراحی شده است. برای استفاده در محیط‌های تولیدی، نیاز به بهبودهای قابل توجهی در امنیت، عملکرد و مقیاس‌پذیری است.

مشارکت
اگر پیشنهادات یا اصلاحات دارید، لطفاً با ما در تماس باشید یا درخواست‌های کش (Pull Requests) خود را ارسال کنید.
با سپاس،ساسان عابدینی



