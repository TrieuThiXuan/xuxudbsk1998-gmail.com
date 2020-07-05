<div class="slider">
    <div class="container">
        <div class="slider d-flex flex-column align-items-center justify-content-center">
            <form action="{{ route('search') }}" method="GET">
                <div class="input-search mb-4">
                    <div class="row">
                        <div class="col-12">
                            <input name="search" class="form-control" placeholder="Tìm kiếm">
                        </div>
                    </div>
                </div>
                <div class="mutil-input-search">
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option value="" disabled selected hidden>Thể loại</option>
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-control">
                                <option value="1">Ví điện tử</option>
                                <option class="2">Thẻ ngân hàng</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-control">
                                <option value="1">Địa điểm</option>
                                <option class="1">Hà Nội</option>
                                <option class="1">Hồ Chí Minh</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-search-time mt-2">
                    <div class="row">
                        <div class="col-4">
                          <input name="time_began" class="form-control datepicker" placeholder="Thời gian bắt đầu">
                        </div>
                        <div class="col-4">
                            <input name="time_finished" class="form-control datepicker" placeholder="Thời gian kết thúc">
                        </div>
                    </div>
                </div>
                <button class="btn btn-info mt-2" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>
</div>
