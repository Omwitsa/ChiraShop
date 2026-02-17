<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="'https://www.aaagrowers.co.ke/flowers'">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
