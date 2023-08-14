<h1>Cakratech Front End Web Developer Test</h1>

Silahkan clone repository ini terlebih dahulu dan gunakan repository yang sudah di clone untuk menyimpan kode program yang sudah kamu buat.

Buat sebuah web dengan fitur sebagai berikut:
<ol>
    <li>
        register user
    </li>
	<li>
		login
	</li>
	<li>
		change password
	</li>
	<li>
		management data negara (country)
	</li>
	<li>
		management data provinsi (province)
	</li>
	<li>
		management data kota (city)
	</li>
	<li>
		menggunakan management state (redux) jika menggunakan React JS untuk menyimpan JWT Token, untuk php gunakanlah session
	</li>
	<li>
		jika menggunakan state harus dibuat persistance agar ketika browser di close token tidak hilang
	</li>
	<li>
		dibuat pengecekan token apakah sudah expired atau belum ketika meload suatu komponen
	</li>
	<li>
		untuk management data harus memiliki fungsi berikut
		<ol>
			<li>
				menampilkan semua data
			</li>
			<li>
				menampilkan data tertentu sesuai dengan id-nya
			</li>
			<li>
				tambah data baru
			</li>
			<li>
				edit data exisiting
			</li>
			<li>
				delete data
			</li>
		</ol>
	</li>
</ol>

syarat tampilan desain aplikasi
<ol>
    <li>
		desain yang digunakan bebas
	</li>
	<li>
		untuk form change password harus menggunakan modal
	</li>
	<li>
		sebelum submit data change password harus ada popup konfirmasi
	</li>
	<li>
		untuk view dan edit form data harus menggunakan modal
	</li>
	<li>
		setiap sebelum submit data baik insert, edit maupun delete harus ada popup konfirmasi
	</li>
</ol>

dibawah ini list API yang digunakan

alamat API dapat di akses di url http://backend-dev.cakra-tech.co.id/api/

API below can use without Header Authorization Bearer (JWT Authentication) </br>

--register user account </br>
POST: /register </br>
body parameter: </br>
{ </br>
	name: string(255), </br>
	email: string(255), </br>
	password: string(min:6) </br>
	password_confirmation: string(min:6) </br>
} </br>

--login user account </br>
POST: /login </br>
body parameter: </br>
{ </br>
	email: string, </br>
	password: string </br>
} </br>

API below must use Header Authorization Bearer (JWT Authentication) </br>

--get current logged in user </br>
GET: /user </br>

--change password </br>
POST: /change-password </br>
body parameter: </br>
{ </br>
	oldPassword: string, </br>
	newPassword: string(min:6) </br>
} </br>

--get all country data </br>
GET: /country </br>

--get id spesific country data </br>
GET: /country/{id} </br>

--insert country data </br>
POST: /country </br>
body parameter:  </br>
{ </br>
	country_code: required|string(max:10), </br>
	country_name: required|string(max:60) </br>
} </br>

--update country data </br>
PUT: /country </br>
body parameter: </br>
{ </br>
	id: int, </br>
	country_code: required|string(max:10), </br>
	country_name: required|string(max:60) </br>
} </br>

--delete country data </br>
DELETE: /country/{id} </br>

--get all province data </br>
GET: /province </br>

--get id spesific province data </br>
GET: /province/{id} </br>

--insert province data </br>
POST: /province </br>
body parameter: </br>
{ </br>
	province_code: required|string(max:10), </br>
	province_name: required|string(max:60), </br>
	country_id: required|country_id must exist in tabel country </br>
} </br>

--update province data </br>
PUT: /province </br>
body parameter: </br>
{ </br>
	id: int, </br>
	province_code: required|string(max:10), </br>
	province_name: required|string(max:60), </br>
	country_id: required|country_id must exist in tabel country </br>
} </br>

--delete province data </br>
DELETE: /province/{id} </br>

--get all city data </br>
GET: /city </br>

--get id spesific city data </br> 
GET: /city/{id} </br>

--insert city data </br>
POST: /city </br>
body parameter: </br>
{ </br>
	city_code: required|string(max:10), </br>
	city_name: required|string(max:60), </br>
	province_id: required|province_id must exist in tabel province </br>
} </br>

--update city data </br>
PUT: /city </br>
body parameter: </br>
{ </br>
	id: int, </br>
	city_code: required|string(max:10), </br>
	city_name: required|string(max:60), </br>
	province_id: required|province_id must exist in tabel province </br>
}

--delete city data </br>
DELETE: /city/{id} </br>
