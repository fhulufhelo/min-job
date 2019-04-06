<form action="{{ route('resume.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
          <label for="path">Upload Resume</label>
          <input name="path" type="file" class="form-control-file" id="path" accept=".docx">
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Resume</button>
              </div>
      </form>

      