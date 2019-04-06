<form action="{{ route('logo.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
          <label for="path">Upload a logo</label>
          <input name="path" type="file" class="form-control-file" id="path">
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Logo</button>
              </div>
      </form>

      