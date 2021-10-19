## Demo Link
http://peminjaman-buku.herokuapp.com/

1. Login Admin | email: admin@email.com | password: 123123123
2. Login Anggota | email: anggota1@gmail.com | password: password
3. Login Anggota 2 | email: anggota2@gmail.com | password: password

## Tabel ERD 
![drawSQL-export-2021-10-17_22_56](https://user-images.githubusercontent.com/68288783/137865093-52bfc5c1-0df6-4415-a1f9-8ff3c976a979.png)

## CRUD Master Buku - Admin
1. Create Buku
# ![Create](https://user-images.githubusercontent.com/68288783/137865294-870e07a3-1d15-482b-93ba-04cfeec15d12.PNG)
2. Read Buku
# ![Read](https://user-images.githubusercontent.com/68288783/137865318-429527e0-ee9c-46a7-9436-ea4981db9c4c.PNG)
3. Update Buku
# ![Update](https://user-images.githubusercontent.com/68288783/137865333-74624c78-de3f-4020-873f-69db79273da1.PNG)
4. Delete Buku
# ![Delete 1](https://user-images.githubusercontent.com/68288783/137865348-85cb8c4f-61a6-4028-82d2-58b99cbd2f51.PNG)
# ![Delete 2](https://user-images.githubusercontent.com/68288783/137865357-4b6d9ab6-194f-43a6-a9a2-b49c2e766b63.PNG)

## CRUD Master Anggota - Admin
1. Create Anggota
![Create](https://user-images.githubusercontent.com/68288783/137865551-a8bff4f9-9fe1-4d5f-a089-dbfe45d37563.PNG)
2. Read Anggota
![Read](https://user-images.githubusercontent.com/68288783/137865565-3488b055-80a8-4ffe-980c-1bc19a96413f.PNG)
3. Update Anggota
![Update](https://user-images.githubusercontent.com/68288783/137865575-6abf27d0-697b-4484-9ddc-3b87e89831d6.PNG)
4. Update Anggota
![Delete 1](https://user-images.githubusercontent.com/68288783/137865588-34f2cfef-edb4-4bd3-a32b-c0298c14190b.PNG)
![Delete 2](https://user-images.githubusercontent.com/68288783/137865596-3509067b-83b0-4daa-b59d-a82ee281e15d.PNG)

## Pengajuan Buku - Admin
1. Menu List Pengajuan Peminjaman Oleh Anggota
![Menu Pengajuan Buku Admin](https://user-images.githubusercontent.com/68288783/137865934-1410fb55-6182-4eeb-bab8-bb14b41aede7.PNG)

2. Menu Approve Admin 
![Pengajuan Buku Admin Approve](https://user-images.githubusercontent.com/68288783/137866016-a1c19bdf-86a1-428a-a51a-23c643e49137.PNG)

3. Menu Dashboard Stok Buku Saat Sebelum Dan Sesudah Approve
![Stok Buku Sebelum Sebelum Approve](https://user-images.githubusercontent.com/68288783/137866605-e32d4d9f-32df-416c-8be8-76dc39bd81d6.PNG)
![Stok Buku Sebelum Setelah Approve](https://user-images.githubusercontent.com/68288783/137866579-96b9476d-4ba1-47df-9f5b-cf943655238a.PNG)

4. Menu Reject Admin
![Pengajuan Buku Admin Rejected](https://user-images.githubusercontent.com/68288783/137866225-fa87e8dd-47d8-4478-915c-1259a62cd151.PNG)

5. List Peminjaman Buku
## List Peminjam Buku
![List Peminjam Buku](https://user-images.githubusercontent.com/68288783/137868745-c69398c8-0f62-4101-b25f-ae4c16fce5fd.PNG)
## Stok Buku Sebelum dan Sesudah Selesai Peminjaman
![Stok Buku Sebelum Di Selesaikan](https://user-images.githubusercontent.com/68288783/137868805-a87eb0c6-e5d5-49bb-9333-bf97133680fa.PNG)
![Status Buku Di Selesaikan](https://user-images.githubusercontent.com/68288783/137868820-31e3f229-c5d1-47e0-9b22-1cf3fa05db7c.PNG)
![Stok Buku SetelahDi Selesaikan](https://user-images.githubusercontent.com/68288783/137868834-3731bdc7-1b2f-4e07-9a43-d01a78340b36.PNG)


## Menu Pengajuan Peminjaman Buku Anggota
1. Menu Pengajuan Buku Anggota
![Pengajuan Buku Anggota](https://user-images.githubusercontent.com/68288783/137870128-0cb7a59d-fddf-4906-a06e-668b0af1c6e3.PNG)
Katalog Buku
![image](https://user-images.githubusercontent.com/68288783/137870528-4b2439dd-d0f9-4e56-bb7a-1a27090212b6.png)
2. List Peminjaman Buku Oleh Anggota
![Daftar Permohonan Buku Anggota](https://user-images.githubusercontent.com/68288783/137870307-43379da0-f431-4edb-a3fa-5402ecbc00c3.PNG)

## API BOOKS
1. http://peminjaman-buku.test/api/books (GET) -  Mengambil data semua buku
![Read Books](https://user-images.githubusercontent.com/68288783/137871590-a507bce9-71c0-4a2d-bd11-8b24ed972a88.PNG)
2. http://peminjaman-buku.test/api/books/{id} (GET) - Mengambil data buku sesuai dengan kode
![Show Books](https://user-images.githubusercontent.com/68288783/137871671-1c3e2e8d-0878-4114-9b33-cdf035b5fc29.PNG)
3. http://peminjaman-buku.test/api/books/{id} (PUT) - Mengubah data buku sesuai dengan kode
![Edit Books](https://user-images.githubusercontent.com/68288783/137871707-e7b9ca2a-4913-4344-8e10-cd7d315efe80.PNG)
4. http://peminjaman-buku.test/api/books (POST) - Membuat buku baru
![Create Books](https://user-images.githubusercontent.com/68288783/137871724-3c7c4797-991d-4fc9-a6e4-2361ec4ab41e.PNG)
5. http://peminjaman-buku.test/api/books/{id} (DELETE) - Menghapus data buku sesuai dengan kode
![Delete Books](https://user-images.githubusercontent.com/68288783/137871755-16f1e791-544a-4a05-aa3f-6848de40fc21.PNG)
