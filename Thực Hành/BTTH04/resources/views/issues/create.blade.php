
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm vấn đề mới</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Thêm vấn đề mới</h2>

    <form action="{{ route('issues.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="computer_id">Tên máy tính</label>
            <select id="computer_id" name="computer_id" class="form-control">
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="model">Tên phiên bản</label>
                <select class="form-control" id="model" name="model" required>
                @foreach($computers as $computer)
                    <option value="{{ $computer->id }}">{{ $computer->model }}</option>
                    @endforeach
                </select>
        </div>

        <div class="form-group">
            <label for="reported_by">Người báo cáo</label>
            <input type="text" id="reported_by" name="reported_by" class="form-control" placeholder="Nhập tên người báo cáo">
        </div>

        <div class="form-group">
            <label for="reported_date">Thời gian báo cáo</label>
            <input type="date" id="reported_date" name="reported_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="urgency">Mức độ sự cố</label>
            <select id="urgency" name="urgency" class="form-control">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Open">Mở</option>
                <option value="In Progress">Đang xử lý</option>
                <option value="Resolved">Đã giải quyết</option>
            </select>
</div>


        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('issues.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>
