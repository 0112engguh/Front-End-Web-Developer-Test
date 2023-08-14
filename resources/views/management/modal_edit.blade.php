<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Input New Province</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <div class="modal-body">
              <form id="insert-data" action="{{url('/province-update')}}" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="form-group">
                      <label for="inputProvinceCode">Province Code</label>
                      <input type="text" class="form-control" name="province_code" id="province_code">
                  </div>

                  <div class="form-group">
                      <label for="inputProvinceName">Province Name</label>
                      <input type="text" class="form-control" name="province_name" id="province_name">
                  </div>

                  <div class="form-group">
                      <label for="">Select Country Id</label>
                      <select class="form-control" name="country_id" id="country_id">
                          @foreach ($country as $item)
                              <option value={{ $item['id'] }}>{{ $item['country_name'] }}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
          </div>


      </div>
  </div>
</div>
</div>