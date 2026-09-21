<h1>Tambah Mata Kuliah</h1>

<form action="/matakuliah" method="POST">
    @csrf

    <label>Kode MK</label>
    <input type="text" name="kode_mk">
    <br><br>

    <label>Nama MK</label>
    <input type="text" name="nama_mk">
    <br><br>

    <label>SKS</label>
    <input type="number" name="sks">
    <br><br>

    <label>Semester</label>
    <input type="number" name="semester">
    <br><br>

    <label>Dosen ID</label>
    <input type="number" name="dosen_id">
    <br><br>

    <button type="submit">Simpan</button>
</form>