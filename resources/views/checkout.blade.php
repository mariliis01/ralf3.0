<x-app-layout>
<form action="{{ route('handle.checkout') }}" method="POST">
    @csrf
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone Number" required>
    <button type="submit">Complete Purchase</button>
</form>
</x-app-layout>