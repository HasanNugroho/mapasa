<input type="hidden" value="{{$data->id}}" id="id_data" name="id">
<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="name" id="name"
        aria-describedby="nama" placeholder="Ahmad" value="{{$data->name}}">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" value="{{$data->email}}"
    aria-describedby="email">
</div>
<div class="form-group">
    <label for="role">Role</label>
    <select class="form-select" aria-label="Pilih role" name="role">
        <option value="manager" @if($data->role == 'manager') selected @endif>Manager</option>
        <option value="superadmin" @if($data->role == 'superadmin') selected @endif>Superadmin</option>
    </select>
</div>
<div class="form-group">
    <label for="exampleInputPassword" class="form-label">Password Lama</label>
    <input type="password" class="form-control" id="exampleInputPassword" name="old_password">
</div>
<div class="form-group">
    <label for="exampleInputPassword1" class="form-label d-flex">Password
        Baru</label>
    <input type="password" name="password" class="form-control"
        id="exampleInputPassword1">
</div>

