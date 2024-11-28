[<?php
if (!isset($_SESSION['flowers'])){
$_SESSION['flowers'] = [
    [
        "name" => "Hoa dạ yến thảo",
        "description" => "Hoa dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp ở nhà.",
        "image" => "images/Hoa dạ yến thảo.webp"
    ],
    [
        "name" => "Hoa đồng tiền",
        "description" => "Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu hè, khi mà cường độ ánh sáng chưa quá mạnh.",
        "image" => "images/Hoa đồng tiền.webp"
    ],
    [
        "name"=> "Hoa thanh tú",
        "description"=> "Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm.",
        "image"=> "images/Hoa thanh tú.webp"
    ],
    [
        "name"=> "Hoa giấy",
        "description"=> "Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăn sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng.",
        "image"=> "images/Hoa giấy.webp"
    ],
    [
        "name"=> "Hoa đèn lồng",
        "description"=> "Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao.",
        "image"=> "images/Hoa đèn lồng.webp"
    ],
    [
        "name"=> "Hoa cẩm chướng",
        "description"=> "Cẩm chướng là loại hoa thích hợp trồng vào dịp xuân - hè, nếu tiết trời không quá lạnh có thể kéo dài đến tận mùa đông.",
        "image"=> "images/Hoa cẩm chướng.webp"
    ],
    [
        "name"=> "Hoa huỳnh anh",
        "description"=> "Nếu bạn đang đi tìm một loài hoa tô điểm cho khu vực ban công hoặc hàng rào ngôi nhà thì huỳnh anh là một lựa chọn thích hợp trong mùa này hơn cả.",
        "image"=> "images/Hoa huỳnh anh.webp"
    ],
    [
        "name"=> "Hoa Păng-xê",
        "description"=> "Vào mỗi độ tháng 4 về là dịp mà loài hoa Phăng-xê nở rộ vô cùng đẹp mắt.",
        "image"=> "images/Hoa Păng-xê.webp"
    ],
    [
        "name"=> "Hoa sen",
        "description"=> "Khi những tia nắng ấm áp của mùa hè bắt đầu xuất hiện thì cũng là lúc mùa sen lại về trên những cánh đồng bạt ngàn.",
        "image"=> "images/Hoa sen.webp"
    ],
    [
        "name"=> "Hoa dừa cạn",
        "description"=> "Hoa dừa cạn còn có các tên gọi như trường xuân hoa, dương giác, bông dừa, mỹ miều hơn thì là Hải Đằng.",
        "image"=> "images/Hoa dừa cạn.webp"
    ],
    [
        "name"=> "Hoa sử quân tử",
        "description"=> "Sử quân tử là loài cây leo, hoa có cánh nhỏ xinh, màu hồng pha trắng hoặc đỏ tươi, mọc thành từng chùm khoe sắc trong nắng sớm, rung rinh trong gió.",
        "image"=> "images/Hoa sử quân tử.webp"
    ],
    [
        "name"=> "Cúc lá nho",
        "description"=> "Cúc lá nho thuộc họ nhà Cúc, được biết đến với những bông hoa nhiều màu sắc phong phú, tươi sáng: nào là trắng, hồng cho đến tím, xanh dương,… và những chiếc lá to với hình dáng răng cưa độc đáo.",
        "image"=> "images/Cúc lá nho.webp"
    ],
    [
        "name"=> "Cẩm tú cầu",
        "description"=> "Cẩm tú cầu là loại cây thường mọc thành bụi có hoa nở to thành từng chùm và đặc biệt thích hợp với mùa hè.",
        "image"=> "images/Cẩm tú cầu.webp"
    ],
    [
        "name"=> "Hoa cúc dại",
        "description"=> "Với phần thân mảnh mai nhưng luôn vươn lên mạnh mẽ, lại chịu được nhiệt độ cao, thậm chí là khi tiết trời hạn hán nên hoa cúc dại cực kỳ thích hợp trồng từ mùa xuân cho đến tận mùa hè nắng gắt.",
        "image"=> "images/Hoa cúc dại.webp"
    ]
];
}

function add($name, $description, $image)
{
    $_SESSION['flowers'][] = [
        'name' => $name,
        'description' => $description,
        'image' => $image
    ];
}

// Cập nhật sản phẩm
function updateFlower($index, $newName, $newDescription, $newImage)
{
    if (isset($_SESSION['flowers'][$index])) {
        $_SESSION['flowers'][$index] = [
            'name' => $newName,
            'description' => $newDescription,
            'image' => $newImage ?: $_SESSION['flowers'][$index]['image']
        ];
        return true;
    }
    return false;
}
function deleteFlower($index)
{
    if (isset($_SESSION['flowers'][$index])) {
        array_splice($_SESSION['flowers'], $index, 1);
        return true;
    }
    return false;
}
