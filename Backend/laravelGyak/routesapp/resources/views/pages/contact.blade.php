@include('components.menu')

<form method="post" action="/contact">
    @csrf
    <label>
        Név:
        <input type="text" name="name" required>
    </label>

    <lable>
        Email:
        <input type="email" name="email" required>
    </lable>

    <input type="submit" value="Beküldés">
</form>
