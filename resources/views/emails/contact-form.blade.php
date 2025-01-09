@include('emails.layout.header')

<!-- Hero Section -->
<tr>
    <td style="padding: 50px 40px; background: linear-gradient(45deg, rgba(0, 146, 71, 0.03) 0%, rgba(0, 146, 71, 0.08) 100%);">
        Name: {{ $data['name'] }} <br>
        Email: {{ $data['email'] }} <br>
        Subject: {{ $data['subject'] }} <br>
        Message: {{ $data['message'] }}
    </td>
</tr>


<!-- Footer -->
@include('emails.layout.footer')
