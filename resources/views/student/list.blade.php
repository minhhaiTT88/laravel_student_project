@extends('layout.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-12 text-center pt-5">
			<h1 class="display-one m-5">PHP Laravel - List Students</h1>
			<div class="text-left"><a href="student/create" class="btn btn-outline-primary">ADD STUDENT</a></div>

			<table class="table mt-3  text-left">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col" class="pr-5">FullName</th>
						<th scope="col">BirthDay</th>
						<th scope="col">Adreess</th>                    
                        <th scope="col">Option</th>  
					</tr>
				</thead>
				<tbody>

					@forelse($students as $student)
					<tr>
						<td>{!! $student->id !!}</td>
						<td class="pr-5 text-right">{!! $student->fullname !!}</td>
                        <td class="pr-5 text-right">{!! $student->birthday !!}</td>
                        <td class="pr-5 text-right">{!! $student->address !!}</td>						
						<td><a href="/edit-student/{!! $student->id !!}"
							class="btn btn-outline-primary">Edit</a>
							<button type="button" class="btn btn-outline-danger ml-1"
								onClick='showModel({!! $student->id !!})'>Delete</button></td>
					</tr>
					@empty
					<tr>
						<td colspan="3">No products found</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="modal fade" id="deleteConfirmationModel" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">Are you sure to delete this record?</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onClick="dismissModel()">Cancel</button>
				<form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
			</div>
		</div>
	</div>
</div>

<script>
function showModel(id) {
	var frmDelete = document.getElementById("delete-frm");
	frmDelete.action = 'student/'+id;
	var confirmationModal = document.getElementById("deleteConfirmationModel");
	confirmationModal.style.display = 'block';
	confirmationModal.classList.remove('fade');
	confirmationModal.classList.add('show');
}

function dismissModel() {
	var confirmationModal = document.getElementById("deleteConfirmationModel");
	confirmationModal.style.display = 'none';
	confirmationModal.classList.remove('show');
	confirmationModal.classList.add('fade');
}
</script>
@endsection