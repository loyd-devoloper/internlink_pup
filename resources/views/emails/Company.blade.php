<x-mail::message>
    Thank you for your message. This is an automated response to let you know that we have received your email.

    Our team is currently reviewing your inquiry and will get back to you within 2-3 working days.

    For immediate assistance, you can contact us directly at internlink.itech@gmail.com

    We appreciate your patience and understanding.

    ACCOUNT:
    email: {{ $data['email'] }}
    password: {{ $data['password'] }}


    Best regards,
    Internlink

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
