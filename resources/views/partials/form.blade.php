@csrf

<div class="form-group">
    <label for="name">Name:</label>
    <br>
    <input class="@error('name') invalid @enderror"
           type="text" name="name" id="name" size="40" autocomplete="off"
           value="{{ old('name', $customer->name) }}">
    @error('name')
        <span class="text-red">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <br>
    <input class="@error('email') invalid @enderror"
           type="email" name="email" id="email" size="40" autocomplete="off"
           value="{{ old('email', $customer->email) }}">
    @error('email')
        <span class="text-red">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="image">Profile Photo</label>
    <br><br>
    <input class="@error('email') invalid @enderror"
           type="file" name="image" id="image" autocomplete="off"
           value="{{ old('image', $customer->image) }}">
    @error('image')
        <span class="text-red">{{ $message }}</span>
    @enderror
</div>
