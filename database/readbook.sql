-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2024 lúc 09:07 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `readbook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `id_book` varchar(10) NOT NULL,
  `name_book` varchar(100) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `describe_book` varchar(1000) DEFAULT NULL,
  `image_book` varchar(200) NOT NULL,
  `file_book` varchar(200) NOT NULL,
  `id_genre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id_book`, `name_book`, `author`, `describe_book`, `image_book`, `file_book`, `id_genre`) VALUES
('s001', '206 Món Canh Dinh Dưỡng Cho Trẻ Em', 'Mai Ngọc', 'Nội dung bao gồm: Canh cá chép mã thầy, canh táo đậu đen hầm cá chép, canh gà đảng sâm, canh gà bí đao, canh long nhãn hạt sen, canh bạch cập ý dĩ thịt nạc, canh bí đao ý dĩ thịt nạc, canh rong đỏ rau câu, canh bí đao rau câu, canh ngô tươi rau cải khô, canh đậu nành rau câu, canh thịt nạc nấu hạt sen bách hợp, canh sơn trà nhân hạt đào, canh thịt gà bí đao, canh vịt đầu xanh nấu đậu đỏ,….', 'images/Ẩm thực - Nấu ăn/206-mon-canh-dinh-duong-cho-tre-em.jpg', 'files/Ẩm thực - Nấu ăn/206-mon-canh-dinh-duong-cho-tre-em.pdf', 'l001'),
('s002', '120 Món Súp Bổ Dưỡng Cho Trẻ Em Và Người Bệnh', 'Mỹ Hạnh', '120 món súp bổ dưỡng cho trẻ em & người bệnh với một số món ăn như: súp phô mai – bí đỏ – cá hồi, súp tôm – gà – bí đỏ, súp bắp non – trứng gà, súp bắp non – thịt ức gà, súp bắp – khoai tây, súp bắp – thịt heo, súp trứng – cải bó xôi, súp bóng cá, súp thịt bò – rau củ, súp tôm chua cay, súp cà chua – thịt gà, súp sò điệp, súp gà – bắp non, súp tôm viên – cải thảo, súp đậu hũ – thịt viên,…..', 'images/Ẩm thực - Nấu ăn/120-mon-sup-bo-duong-cho-tre-em-va-nguoi-benh.jpg', 'files/Ẩm thực - Nấu ăn/120-mon-sup-bo-duong-cho-tre-em-va-nguoi-benh.pdf', 'l001'),
('s003', 'Những Món Ăn Chay Nổi Tiếng', 'Thiên Kim', 'Thực ra, các món chay không chỉ ngon miệng, cung cấp đủ chất dinh dưỡng mà còn dễ thực hiện. “Những món ăn chay nổi tiếng” là cẩm nang ẩm thực chay hoàn hảo, nó hấp dẫn ngay cả những người ăn mặn đã từng cho rằng ăn chay là thiếu dinh dưỡng. Cuốn sách hướng dẫn bạn làm các món chay từ khai vị đến tráng miệng. Bạn hãy thử chọn một thực đơn cho bữa ăn gia đình mà bạn ưa thích. Sự ngạc nhiên và ngon miệng của mọi người chắc chắn sẽ dành cho bạn. Rồi bạn sẽ làm cho họ “ghiền” ăn chay bởi tài chế biến của bạn qua các món chay nổi tiếng này!', 'images/Ẩm thực - Nấu ăn/nhung-mon-an-chay-noi-tieng.jpg', 'files/Ẩm thực - Nấu ăn/nhung-mon-an-chay-noi-tieng.pdf', 'l001'),
('s004', 'Những Món Cơm Ngon Đặc Sắc', 'Tiểu Quỳnh', 'Bữa cơm gia đình Việt Nam vốn có hàm nghĩa là sum vầy, đầm ấm, tượng trưng cho ý nghĩa đẹp nhất của một gia đình hạnh phúc. Ngày nay, cùng với sự phát triển của đất nước, chúng ta chẳng những đã có những bữa cơm no mà còn có những bữa cơm ngon với kỹ thuật chế biến đẹp mắt hơn. Nấu một bữa cơm, có lẽ cũng là điều giản dị đối với hầu hết mọi người. Nhưng để nấu một bữa cơm ngon, chắc chắn phải đòi hỏi một nghệ thuật, kỹ thuật đặc biệt. Mong rằng cuốn sách nhỏ này sẽ hướng dẫn, gợi ý giúp các bạn nấu một bữa cơm đủ dinh dưỡng, ngon, lạ, đặc sắc, dành cho những người thân yêu trong gia đình.', 'images/Ẩm thực - Nấu ăn/nhung-mon-com-ngon-dac-sac.jpg', 'files/Ẩm thực - Nấu ăn/nhung-mon-com-ngon-dac-sac.pdf', 'l001'),
('s005', 'Các Món Ăn Đặc Sản Miền Nam', 'Lâm Hoa Phụng', 'Đặc điểm món ăn từng miền tuy khác nhau, nhưng vẫn có những điểm tương đồng, thể hiện qua cơ cấu bữa ăn, nguyên tắc chế biến như nước dùng, nước mắm, gia vị hỗn hợp, rau phong phú, các loại nước chấm chế biến đa dạng phù hợp với món ăn. Vì vậy, không chỉ người Việt mà nhiều người nước ngoài đều rất yêu thích văn hóa ẩm thực của đất nước hình chữ S. Món ăn của người miền Nam đơn giản, không cầu kỳ như chính con người nơi đây là thật thà, giản dị. Miền Nam món ăn đa dạng, biến hóa khôn lường với vị ngọt, cay, béo do sử dụng nước dừa. Các món ăn đặc trưng sử dụng ngọt nhiều: bánh (bánh in, bánh men, bánh ít, bánh bò…), chè (chè kiếm, chè chuối), xôi, nem nướng, cháo gà, gà rô ti… đều sử dụng nước dừa hay cốm dừa để tăng vị béo, vị ngọt. Các món đặc trưng: cá lóc nướng trui, gỏi cuốn, bún mắm, hủ tiếu Nam Vang…', 'images/Ẩm thực - Nấu ăn/cac-mon-an-dac-san-mien-nam.jpg', 'files/Ẩm thực - Nấu ăn/cac-mon-an-dac-san-mien-nam.pdf', 'l001'),
('s006', 'Các Món Ăn Chơi Xôi Chè Việt Nam', 'Quỳnh Chi', 'Nói đến món ăn thuần tuý Việt Nam thì chúng ta không thể không đề cập tới các món ăn đặc sản đó là nét văn hóa ẩm thực đặc trưng của một dân tộc, ngoài các món ăn thuần tuý này ra còn có các loại món ăn khác dùng hằng ngày đó là các loại Xôi Chè được chế biến qua các loại thực phẩm, củ, quả v.v… Cuốn sách Xôi chè Việt Nam của tác giả Quỳnh Chi sẽ giới thiệu với các bạn cách nấu các món chè Việt Nam. Sách trình bày đẹp, nhỏ gọn, là một món quà dành cho các bạn gái và các bà nội trợ.', 'images/Ẩm thực - Nấu ăn/cac-mon-an-choi-xoi-che-viet-nam.jpg', 'files/Ẩm thực - Nấu ăn/cac-mon-an-choi-xoi-che-viet-nam.pdf', 'l001'),
('s007', 'Kỹ Thuật Nấu Ăn Đãi Tiệc – 60 Món Tôm', 'Triệu Thị Chơi - Nguyễn Thị Phụng', 'Trong các bữa tiệc, món ăn được chế biến từ tôm thường hấp dẫn khẩu vị và được nhiều thực khách yêu thích bởi cách thức chế biến đa dạng, món ăn ngon miệng và đầy đủ dưỡng chất. Cuốn sách này giúp bạn đọc nâng cao tay nghề nấu nướng khéo léo của mình thông qua 60 món tôm như: Tôm càng uyên ương, Tôm bọc xôi chiên, Tôm dạ hội, Tôm hắc bạch công tử, Tôm thẻ sốt Hoa Kỳ, Tôm chiên cơm cháy, Tôm chi lan Bắc Kinh… ', 'images/Ẩm thực - Nấu ăn/ky-thuat-nau-an-dai-tiec-60-mon-tom.jpg', 'files/Ẩm thực - Nấu ăn/ky-thuat-nau-an-dai-tiec-60-mon-tom.pdf', 'l001'),
('s008', '30 Món Ngon Đãi Tiệc', 'Đỗ Kim Trung', 'Cá bống mú chiên giòn, khoai tây nhồi thịt bò, chả giò hải sản, gà hấp nhụy sen, chả cá ba sa bọc xúc xích, đậu hũ non chiên xù, sứa tươi trộn hỗn hợp, cánh gà nấu nấm hương, sò dương trộn chua ngọt, cá sa ba nướng sả, sò nhồi, nghêu chiên giòn, thịt nạc cuộn tôm hấp ,chả đùm, chả cá thác lác hấp, lưỡi heo nấu đậu, chim mía ram, thịt đà điểu chiên xù ,nem chua nướng, gà xốt pate, chim cút tiềm dừa, chả cá lăn cốm, cá hồi cuộn rau củ, hoành thánh hải sản chiên giòn, tôm hấp trái dừa, hải sản chiên giòn, chả cá bọc ngô bao tử, cá lóc hấp bầu, xúp cua, cháo cá lóc rau đắng.', 'images/Ẩm thực - Nấu ăn/30-mon-ngon-dai-tiec.jpg', 'files/Ẩm thực - Nấu ăn/30-mon-ngon-dai-tiec.pdf', 'l001'),
('s009', 'Sức khỏe trong tay bạn', 'Trần Bích Hà', '\'Cuốn sách này bao gồm hai phần: Phần một là tập hợp những chia sẻ do tôi tham khảo được, đã “thử nghiệm” cho bản thân, bạn bè và gia đình để áp dụng các phương pháp tự nhiên trong chăm sóc, bảo vệ sức khỏe cũng như chữa các bệnh mãn tính. Phần hai là các kiến thức sưu tầm của tôi về các phương pháp chữa ung thư, được viết từ năm 2011 và 2012, vừa được tôi chỉnh sửa lại.\'', 'images/Y Học - Sức Khỏe/suc-khoe-trong-tay-ban.jpg', 'files/Y Học - Sức Khỏe/suc-khoe-trong-tay-ban.pdf', 'l002'),
('s010', 'Hệ Thống Làm Khỏe Lại và Sống Không Cần Thuốc', 'Paul Bragg – Người dịch Bùi Thanh Hằng', 'Trong quyển sách này bạn sẽ tìm được một cái nhìn mới thay đổi toàn bộ nếp nghĩ, nếp sống và cách rèn luyện sức khỏe, điều ảnh hưởng đến bạn và gia đình bạn. Paul Bragg – Tác phẩm chính và các bài giảng của ông. Điều tốt nhất mà một quyển sách có thể phục vụ bạn là không những nó thông báo cho bạn một chân lý mà còn bắt bạn phải suy nghĩ về chân lý đó.', 'images/Y Học - Sức Khỏe/he-thong-lam-khoe-lai-song-khong-can-thuoc.jpg', 'files/Y Học - Sức Khỏe/he-thong-lam-khoe-lai-song-khong-can-thuoc.pdf', 'l002'),
('s011', 'Ung Thư – Sự Thật, Hư Cấu và Gian Lận', 'Ty Bollinger', '\'Cuốn sách này dành cho mục đích giáo dục. Nó không thay thế cho việc chẩn đoán, điều trị, hay tư vấn của các chuyên gia y tế được cấp phép hành nghề. Các dữ kiện được trình bày trong sách chỉ mang tính chất cung cấp thông tin, không phải là tư vấn y tế, và không ai nên suy diễn rằng tôi đang hành nghề y.\'', 'images/Y Học - Sức Khỏe/ung-thu-su-that-hu-cau-va-gian-lan.jpg', 'files/Y Học - Sức Khỏe/ung-thu-su-that-hu-cau-va-gian-lan.pdf', 'l002'),
('s012', 'Hướng Dẫn Chẩn Đoán, Điều Trị 65 Bệnh Da Liễu', 'Bộ Y Tế', 'Tài liệu được xây dựng với sự nỗ lực cao của các nhà khoa học đầu ngành về Da liễu của Việt Nam. Tài liệu bao gồm 11 chương và 65 bài hướng dẫn chẩn đoán và điều trị các bệnh Da liễu. Trong đó, tập trung vào hướng dẫn thực hành chẩn đoán và điều trị, vì vậy sẽ rất hữu ích cho các thầy thuốc đa khoa, chuyên khoa trong thực hành lâm sàng hàng ngày.', 'images/Y Học - Sức Khỏe/huong-dan-chan-doan-dieu-tri-65-benh-da-lieu.jpg', 'files/Y Học - Sức Khỏe/huong-dan-chan-doan-dieu-tri-65-benh-da-lieu.pdf', 'l002'),
('s013', 'Bào Chế Đông Dược', 'Ts. Nguyễn Đức Quang', 'Bào chế Đông dược” là cuốn sách nói về bào chê các dạng thuốc phương Đông, là phần tiếp nối của chế biến đê chuyên từ thuôc chín thành các dạng thuôc sử dụng trực tiếp cho người bệnh, đó là các dạng Cao, Đơn, Hoàn, Tán, Đĩnh, Lộ … và Thuôc sắc. Trước đây, các dạng thuốc này được coi là bí mật, gia truyền của các lương y, vì thế còn thiếu sự thống nhất và chuẩn hoá vê phương pháp bào chế. Trong cuốn sách này, tác giả trình bàv kỹ thuật bào chê các dạng thuôc trên cơ sở lý luận của Y Dược học phương Đông, có chứng minh bằng các dữ liệu khoa học; đồng thòi giói thiệu các bài thuốc của các lương y công hiến cho Bộ Y tế, các bài thuốc cổ phương được giới thiệu trong Dược điển của một sô” nưóc, các bài thuôc đã qua nghiên cứu của các trường đại học và các bài thuốc sở trường của một sô’ cơ sở Đông y.', 'images/Y Học - Sức Khỏe/bao-che-dong-duoc.jpg', 'files/Y Học - Sức Khỏe/bao-che-dong-duoc.pdf', 'l002'),
('s014', 'Bách Khoa Về Vitamin', 'BS Thu Minh', 'Sức khoẻ là một trong những vấn đề quan trọng nhất của con người, và chế độ ăn uống hàng ngày sẽ ảnh hưởng trực tiếp đến cơ thể mỗi chúng ta. Vì vậy, vấn đề dinh dưỡng phải được đặt lên hàng đầu. Cuốn sách Bách khoa về Vitamin này sẽ cung cấp cho bạn đọc những thông tin bổ ích và thiết thực về vitamin và chất khoáng trong đồ ăn, thức uống hàng ngày. Đặc biệt trong cuốn sách còn có những bảng liệt kê chi tiết hàm lượng vitamin và chất khoáng chứa trong các loại thực phẩm, rau quả, đồ uống cùng với những lời khuyên bổ ích về đối tượng dùng, lượng dùng, cách chế biến… Với nội dung trình bày khoa học, rõ ràng, dễ hiểu, hy vọng Bách khoa về vitamin sẽ là cuốn sổ tay thiết yếu đối với mỗi gia đình, qua đó mỗi người sẽ lựa chọn cho mình một chế độ ăn uống hợp lý để không những đảm bảo sức khoẻ mà còn góp phần phòng tránh bệnh tật.', 'images/Y Học - Sức Khỏe/bach-khoa-ve-vitamin.jpg', 'files/Y Học - Sức Khỏe/bach-khoa-ve-vitamin.pdf', 'l002'),
('s015', 'Trạng Quỳnh', 'Khuyết Danh', 'Danh sách chương: bà Chúa mắc lỡm, ăn trộm mèo, nhặt bã trầu, dòm nhà quan bảng, dê đực chửa, trả ơn chúa Liễu, câu đố, trả nợ anh lái đò, Vay tiền chúa, Đầu to bằng cái bồ, lện vua ban, quả đào trường thọ, hũ tương Đại Phong, làm thơ xin ăn, ông nọ, bà kia, quyển sách quý, chọi gà sống thiến, vụ kiện chôn sách,…..', 'images/Truyện Cười - Tiếu Lâm/trang-quynh.jpg', 'files/Truyện Cười - Tiếu Lâm/trang-quynh.pdf', 'l003'),
('s016', 'Ba Chàng Ngốc', 'Chetan Bhagat', '\'Năm 2009, câu chuyện về chúng tôi đã được đạo diễn Rajkumar Hirani chuyển thể thành Ba chàng ngốc – bộ phim Bollywood phá mọi kỷ lục phòng vé để trở thành bộ phim ăn khách nhất lịch sử Ấn Độ. Còn bây giờ, nào, hãy cùng chúng tôi trải nghiệm những năm tháng tuổi trẻ điên rồ nổi loạn!\'', 'images/Truyện Cười - Tiếu Lâm/ba-chang-ngoc.jpg', 'files/Truyện Cười - Tiếu Lâm/ba-chang-ngoc.pdf', 'l003'),
('s017', 'Tiếng cười Bác Ba Phi', 'Nhiều tác giả', 'Bác Ba Phi là một nhân vật trong văn học dân gian. Ông là nhân vật chính trong những câu chuyện kể về cuộc sống sinh hoạt thường ngày nhưng được cường điệu quá đáng (như rắn tát cá, chọi đá làm máy bay rơi, leo cây ớt té gãy chân…) và được trình bày một cách tự nhiên khiến người nghe hoàn toàn bất ngờ và bật cười. Ông là nhân vật cận đại nhất trong lịch sử kho tàng truyện trạng (nói dóc) của văn học Việt Nam.', 'images/Truyện Cười - Tiếu Lâm/tieng-cuoi-bac-ba-phi.jpg', 'files/Truyện Cười - Tiếu Lâm/tieng-cuoi-bac-ba-phi.pdf', 'l003'),
('s018', 'Truyện Xiển Bột', ' Khuyết Danh', 'Xiển Bột hay Xiển Ngộ là một nhân vật dân gian được cho là có thật, tên là Nguyễn Xiển, sống ở cuối thời phong kiến của Việt Nam, tại làng Hoằng Bột, nay là xã Hoằng Lộc, huyện Hoằng Hóa, Thanh Hóa. Ông được cho là hậu duệ của Trạng Quỳnh (chắt của Trạng Quỳnh), tương truyền khi mới sinh ra, Xiển mặt vuông chữ điền, tai to như tai phật, mồm rộng, mắt sáng.', 'images/Truyện Cười - Tiếu Lâm/truyen-xien-bot.jpg', 'files/Truyện Cười - Tiếu Lâm/truyen-xien-bot.pdf', 'l003'),
('s019', 'Ba Giai – Tú Xuất', 'Khuyết Danh', 'Tương truyền Ba Giai là tác giả các bài Hà thành chính khí ca, Hà thành hiểu vọng và Vịnh đề đốc Lê Văn Trinh. Qua đó, tác giả ca ngợi bậc trung dũng và phê phán những viên quan sợ chết, đã chạy trốn hay đầu hàng quân xâm lược. Mãi trăm năm sau, những giai thoại Ba Giai – Tú Xuất được dựng lại thành những vở tuồng chèo dân gian, kịch hài hiện đại, được xuất bản thành sách, truyện tranh.', 'images/Truyện Cười - Tiếu Lâm/ba-giai-tu-xuat.jpg', 'files/Truyện Cười - Tiếu Lâm/ba-giai-tu-xuat.pdf', 'l003'),
('s020', 'Truyện Cười Song Ngữ Anh – Việt', 'Chưa Rõ', 'Ngôn ngữ trong các câu chuyện phần lớn là ngôn ngữ đời sống hàng ngày, không có tính chất trang trọng (informal) dùng để nói chuyện với bạn bè, với những người thân thuộc xung quanh. Những mẩu truyện cười trong tập sách này có số lượng từ vựng phong phú xung quanh các chủ đề đời sống hàng ngày giúp các bạn xem việc sử dụng từ và ngữ pháp trong việc học tiếng Anh, giúp làm phong phú số từ vựng của các bạn.', 'images/Truyện Cười - Tiếu Lâm/truyen-cuoi-song-ngu-anh-viet.jpg', 'files/Truyện Cười - Tiếu Lâm/truyen-cuoi-song-ngu-anh-viet.pdf', 'l003'),
('s021', 'Truyện Kiều', 'Nguyễn Du', 'Truyện Kiều là tiểu thuyết viết bằng thơ lục bát. Truyện phản ánh xã hội đương thời thông qua cuộc đời của nhân vật chính Vương Thuý Kiều. Xuyên suốt tác phẩm là chữ “tâm” theo như Nguyễn Du đã tâm niệm “Linh Sơn chỉ tại nhữ tâm đầu” (nghĩa là “Linh Sơn chỉ ở lòng người thôi”). Ngày nay, Truyện Kiều của Nguyễn Du là một trong những tác phẩm văn học Việt Nam được giới thiệu rộng rãi nhất đến với các du khách cũng như các nhà nghiên cứu nước ngoài.', 'images/Văn Học Việt Nam/truyen-kieu.jpg', 'files/Văn Học Việt Nam/truyen-kieu.pdf', 'l004'),
('s022', 'Tắt Đèn', 'Ngô Tất Tố', 'Mở đầu tác phẩm là không khí căng thẳng, ngột ngạt của một làng quê trong những ngày sưu thuế. Cổng làng đóng lại, công việc cày bừa đình đốn, bọn lý trưởng, trương tuần chửi bới, quát tháo om sòm; Mấy tên cai lệ, lính cơ tay thước, roi song, dây thừng đi tróc người thiếu thuế. Tiếng trống, mõ, tù và inh ỏi, tiếng thét lác, đánh đập, tiếng kêu khóc thảm thiết vang lên như trong một cuộc săn người…', 'images/Văn Học Việt Nam/tat-den.jpg', 'files/Văn Học Việt Nam/tat-den.pdf', 'l004'),
('s023', 'Dứt Tình', 'Vũ Trọng Phụng', 'Vũ Trọng Phụng là một nhà văn, nhà báo, một cây bút phóng sự với nhiều bài tiêu biểu. Năm 1930, ông có bài đăng trên Ngọ báo, nhưng lúc này tên tuổi ông chưa thực sự được chú ý trong giới văn học Việt Nam. Mãi đến 1931, vở kịnh Không một tiếng vang ra đời, thì mới bắt đầu gây được sự chú ý của bạn đọc. Năm 1934, Vũ Trọng Phụng có tiểu thuyết đầu tay “Dứt tình” (còn có tên khác là Bởi không duyên kiếp) đăng trên tờ Hải Phòng tuần báo. Với tiểu thuyết này, Vũ Trọng Phụng được khen là “ngòi bút tả chân thực đã khéo léo”.“Dứt tình” là cuốn tiểu thuyết mang tư tưởng định mệnh siêu hình.', 'images/Văn Học Việt Nam/dut-tinh.jpg', 'files/Văn Học Việt Nam/dut-tinh.pdf', 'l004'),
('s024', 'Ăn Mày Dĩ Vãng', 'Chu Lai', 'Truyện kết thúc ở một nhận định và một câu hỏi khiến người đọc không khỏi ngậm ngùi “cuộc chiến tranh vừa qua có thể là trò đùa nhưng sự mất mát lại là có thật. Cuộc đời hôm nay có thể chỉ là tấn tuồng nhưng nỗi buồn không bao giờ là một màn kịch cả”.', 'images/Văn Học Việt Nam/an-may-di-vang.jpg', 'files/Văn Học Việt Nam/an-may-di-vang.pdf', 'l004'),
('s025', 'Những Mảnh Đời Đen Trắng', 'Nguyễn Quang Lập', 'Những mảnh đời đen trắng là một tác phẩm mạnh và dứt khoát. Là cuộc xung đột giữa hai tầng lớp xã hội, hai quan điểm sống khác nhau. Giữa hai thế hệ già và trẻ, giữa lớp người có quá khứ oai hùng và lớp ngưới không được quyền có quá khứ. Giữa lớp bần cố nông làm chủ tập thể, làm chủ tình thế và lớp trí thức tiểu tư sản “đầu thai nhầm thế kỷ, bị quê hương ruồng bỏ giống nòi khinh”. Cả hai giai tầng đều đáng thương mà không đáng trách. Một bên có khả năng nhận thức mà không được sử dụng. Một bên không có khả năng mà phải gánh vác những công việc quá sức mình.', 'images/Văn Học Việt Nam/nhung-manh-doi-den-trang.jpg', 'files/Văn Học Việt Nam/nhung-manh-doi-den-trang.pdf', 'l004'),
('s026', 'Bên Kia Bờ Ảo Vọng', 'Dương Thu Hương', 'Cái nổi bật của tiểu thuyết nằm ở ngay vấn đề mà tác giả đặt ra: lên án thói giả trá, ti tiện, lột trần thực chất tầm thường của những thần tượng trong cuộc sống thông thường của mỗi người. Ý nghĩa khái quát rút ra là: người ta không nên đem cả cuộc đời mình, hạnh phúc của mình đặt dưới chân những thần tượng có bề ngoài hào nhoáng nhưng thực chất tầm thường, phàm tục. Đây không chỉ là vấn đề của các cá nhân riêng lẻ mà ít nhiều còn là vấn đề của thời đại. Với tiểu thuyết này, tác giả đã tấn công vào thành lũy thói quen ngộ nhận cũ. Sự mạnh mẽ ấy làm cho tiểu thuyết có sức hấp dẫn, lôi cuốn ngay từ khi mới xuất bản.', 'images/Văn Học Việt Nam/ben-kia-bo-ao-vong.jpg', 'files/Văn Học Việt Nam/ben-kia-bo-ao-vong.pdf', 'l004'),
('s027', 'Tuyển tập Truyện Ngắn Nguyễn Công Hoan', 'Nguyễn Công Hoan', 'Truyện ngắn Nguyễn Công Hoan, rất ngắn, cấu trúc gọn và đầy tính hài hước. Ngôn ngữ của ông giản dị, chữ dùng chọn lọc chính xác gợi những hình ảnh đậm nét, dí dỏm và thông minh. Gấp trang sách, người đọc cảm thấy không thể chịu đựng nổi nếu những cảnh huống như vừa đọc còn tiếp tục diễn ra trong cuộc sống con người. Nghệ thuật trào phúng của ông không chỉ bộc lộ rõ ưu thế trong truyện ngắn', 'images/Văn Học Việt Nam/tuyen-tap-truyen-ngan-nguyen-cong-hoan.jpg', 'files/Văn Học Việt Nam/tuyen-tap-truyen-ngan-nguyen-cong-hoan.pdf', 'l004'),
('s028', 'Vang bóng một thời', 'Nguyễn Tuân', 'Vang Bóng Một Thời viết năm 1940 đã được dư luận chung coi như một trong những tác phẩm hay và nổi tiếng nhất của nền văn chương Việt Nam, cũng là một trong những tác phẩm được nhắc tới nhiều nhất, được coi như ngang hàng với Hồn Bướm Mơ Tiên của Khái Hưng, Ðôi Bạn của Nhất Linh', 'images/Văn Học Việt Nam/vang-bong-mot-thoi.jpg', 'files/Văn Học Việt Nam/vang-bong-mot-thoi.pdf', 'l004'),
('s029', 'Luật Thương Mại', 'Quốc Hội Việt Nam', 'Ngày 14/6/2005, Quốc hội ban hành Luật Thương mại số 36/2005/QH11, áp dụng đối với các cá nhân hoạt động thường xuyên, độc lập; Các thương nhân hoạt động thương mại; Các tổ chức, cá nhân khác hoạt động có liên quan tới thương mại', 'images/Thư Viện Pháp Luật/luat-thuong-mai.jpg', 'files/Thư Viện Pháp Luật/luat-thuong-mai.pdf', 'l005'),
('s030', 'Luật Doanh Nghiệp', 'Quốc Hội Việt Nam', 'Ngày 26/11/2014, Quốc hội đã thông qua Luật Doanh nghiệp năm 2014 ( Luật số: 68/2014/QH13 ), có hiệu lực kể từ 01/7/2015; Luật này quy định về việc thành lập, tổ chức quản lý, tổ chức lại, giải thể và hoạt động có liên quan của doanh nghiệp, bao gồm công ty trách nhiệm hữu hạn, công ty cổ phần, công ty hợp danh và doanh nghiệp tư nhân; quy định về nhóm công ty.', 'images/Thư Viện Pháp Luật/luat-doanh-nghiep.jpg', 'files/Thư Viện Pháp Luật/luat-doanh-nghiep.pdf', 'l005'),
('s031', 'Luật Đất Đai', 'Quốc Hội Việt Nam', 'Luật đất đai – Luật số 45/2013/QH13 điều chỉnh Chương trình xây dựng luật, pháp lệnh nhiệm kỳ Quốc hội khóa XIII, năm 2013 và Chương trình xây dựng luật, pháp lệnh năm 2014 do Quốc hội ban hành, sửa đổi bổ sung một số điều so với Luật Đất đai 2003, Luật Đất đai mới nhất này có 14 chương với 212 điều, tăng 7 chương và 66 điều. Luật có hiệu lực từ ngày 01/07/2014.', 'images/Thư Viện Pháp Luật/luat-dat-dai.jpg', 'files/Thư Viện Pháp Luật/luat-dat-dai.pdf', 'l005'),
('s032', 'Điều Lệ Đảng Cộng Sản Việt Nam', 'Quốc Hội Việt Nam', 'Đảng Cộng sản Việt Nam là đội tiên phong của giai cấp công nhân, đồng thời là đội tiên phong của nhân dân lao động và của dân tộc Việt Nam; đại biểu trung thành lợi ích của giai cấp công nhân, của nhân dân lao động và của dân tộc. Cuốn sách này trình bày những nội dung của điều lệ Đảng Cộng Sản Việt Nam: Đảng viên, nguyên tắc tổ chức và cơ cấu tổ chức của Đảng, cơ quan lãnh đạo của Đảng ở cấp Trung ương, cơ quan lãnh đạo của Đảng ở cấp địa phương, khen thưởng và kỉ luật, tài chính của Đảng, chấp hành điều lệ Đảng,…', 'images/Thư Viện Pháp Luật/dieu-le-dang-cong-san-viet-nam.jpg', 'files/Thư Viện Pháp Luật/dieu-le-dang-cong-san-viet-nam.pdf', 'l005'),
('s033', 'Luật An Ninh Mạng – 2018', 'Quốc Hội Việt Nam', 'Luật an ninh mạng 2018 được Quốc hội thông qua ngày 12/6/2018 và bắt đầu có hiệu lực thi hành kể từ ngày 01/01/2019. Luật an ninh mạng gồm có 07 Chương và 43 Điều, trong đó, nêu ra các nguyên tắc bảo vệ an ninh mạng', 'images/Thư Viện Pháp Luật/luat-an-ninh-mang-2018.jpg', 'files/Thư Viện Pháp Luật/luat-an-ninh-mang-2018.pdf', 'l005'),
('s034', 'Bộ Luật Lao Động', 'Quốc Hội Việt Nam', 'Bộ luật Lao động (Luật số: 10/2012/QH13) đã được Quốc hội khoá XIII thông qua ngày 18/6/2012, bắt đầu có hiệu lực từ 1/5/2013. Bộ luật lao động gồm 17 chương, 242 điều, tăng 19 điều so với Bộ luật Lao động năm 2006.', 'images/Thư Viện Pháp Luật/bo-luat-lao-dong.jpg', 'files/Thư Viện Pháp Luật/bo-luat-lao-dong.pdf', 'l005'),
('s035', 'Khi Người Ta Tư Duy', 'James Allen', 'Hơn một thế kỷ đã trôi qua kể từ lần xuất bản đầu tiên vào năm 1902, “Khi người ta tư duy” vẫn luôn là một trong những kiệt tác bán chạy nhất và liên tiếp nhận được sự tán dương, ca ngợi từ độc giả. Với hàng triệu bản được ấn hành, cuốn sách đã truyền cảm hứng tới hàng triệu người trên toàn thế giới.  Nội dung xuyên suốt của cuốn sách rất đơn giản: con người bạn ở hiện tại và tương lai chính là những gì bạn tư duy và mơ ước. Tuy không có dung lượng đồ sộ nhưng với cách viết súc tích và thuyết phục, cuốn sách xinh xắn này chắc chắn không phải chỉ để đọc một lần, mà sẽ là hành trang quý giúp bạn khám phá sức mạnh lớn lao của bộ óc con người và làm chủ sức mạnh kỳ diệu ấy.', 'images/Tâm Lý - Kỹ Năng Sống/khi-nguoi-ta-tu-duy.jpg', 'files/Tâm Lý - Kỹ Năng Sống/khi-nguoi-ta-tu-duy.pdf', 'l006'),
('s036', 'Mặc Kệ Thiên Hạ – Sống Như Người Nhật', 'Mari Tamagawa', 'Cuốn sách gối đầu giường cho những người hay lo lắng, sợ hãi và luôn thấy mình kém may mắn. Dành cho những ai muốn được sống là chính mình, cuộc đời của mình, tuổi trẻ của mình. Mặc hệ thiên hạ, sống như người Nhật chính là cuốn sách dành cho những người muốn đi bằng chính đôi chân mình. Dành cho những người muốn gạt bỏ những nỗi sợ bởi chính tay mình, chứ không cầu cứu bất kì sự trợ giúp nào. Hãy thử sống một ngày “mặc kệ thiên hạ”, mặc kệ những lời nhận xét từ người khác. Hãy thử sống một ngày bạn cho phép mình từ bỏ, từ bỏ những thứ khó khăn, ngổn ngang lo lắng. Hãy thử sống một ngày bạn trân trọng mọi cung bậc cảm xúc bên trong con người bạn.', 'images/Tâm Lý - Kỹ Năng Sống/mac-ke-thien-ha-song-nhu-nguoi-nhat.jpg', 'files/Tâm Lý - Kỹ Năng Sống/mac-ke-thien-ha-song-nhu-nguoi-nhat.pdf', 'l006'),
('s037', '7 Thói Quen Để Thành Đạt', 'Stephen R.Covey', 'Cùng với những cuốn sách kinh điển như Đắc Nhân Tâm, Nhà Giả Kim, 7 Thói Quen Để Thành Đạt (The 7 Habits of Highly Effective People) của tác giả Stephen R. Covey luôn được mọi người đón đọc và đánh giá rất cao như một cẩm nang rèn luyện để đi đến thành công. Với 20 triệu bản phát hành, được dịch ra hơn 40 ngôn ngữ, ngay từ lần xuất bản đầu tiên, 7 Thói Quen Để Thành Đạt đã trở thành một trong những cuốn sách có giá trị và nổi tiếng nhất thế giới về thể loại self-help – tự rèn luyện bản thân để thành công trong cuộc sống.', 'images/Tâm Lý - Kỹ Năng Sống/7-thoi-quen-de-thanh-dat.jpg', 'files/Tâm Lý - Kỹ Năng Sống/7-thoi-quen-de-thanh-dat.pdf', 'l006'),
('s038', 'Đời Ngắn Đừng Ngủ Dài', 'Robin Sharma', '“Mọi lựa chọn đều giá trị. Mọi bước đi đều quan trọng. Cuộc sống vẫn diễn ra theo cách của nó, không phải theo cách của ta. Hãy kiên nhẫn. Tin tưởng. Hãy giống như người thợ cắt đá, đều đặn từng nhịp, ngày qua ngày. Cuối cùng, một nhát cắt duy nhất sẽ phá vỡ tảng đá và lộ ra viên kim cương. Người tràn đầy nhiệt huyết và tận tâm với việc mình làm không bao giờ bị chối bỏ. Sự thật là thế.” .Bằng những lời chia sẻ thật ngắn gọn, dễ hiểu về những trải nghiệm và suy ngẫm trong đời, Robin Sharma tiếp tục phong cách viết của ông từ cuốn sách Điều vĩ đại đời thường để mang đến cho độc giả những bài viết như lời tâm sự, vừa chân thành vừa sâu sắc.', 'images/Tâm Lý - Kỹ Năng Sống/doi-ngan-dung-ngu-dai.jpg', 'files/Tâm Lý - Kỹ Năng Sống/doi-ngan-dung-ngu-dai.pdf', 'l006'),
('s039', 'Làm Ít Được Nhiều', 'Chin Ning Chu', 'Trong thời đại thay đổi nhanh chóng và cạnh tranh gay gắt hiện nay, chúng ta thường tự vướng vào một quan điểm quá mệt mỏi là tin rằng thành công chỉ đến khi phải đánh đổi bằng sự cân bằng của cuộc sống. Tuy nhiên, hầu hết những người thành công lại không nhất thiết phải làm việc vất vả. Trong quyển Làm ít được nhiều, tác giả có sách bán chạy Ching-Nin-Chu giải thích cách làm thế nào để giải tỏa cái vòng lẩn quẩn đó và học cách để vừa bình an vừa hiệu quả cùng một lúc.', 'images/Tâm Lý - Kỹ Năng Sống/lam-it-duoc-nhieu.jpg', 'files/Tâm Lý - Kỹ Năng Sống/lam-it-duoc-nhieu.pdf', 'l006'),
('s040', 'Khéo Ăn Nói Sẽ Có Được Thiên Hạ', 'Trác Nhã', 'Khéo Ăn Nói Sẽ Có Được Thiên Hạ là một cuốn sách tự phát triển bản thân đầy sức hút và độc đáo. Tác giả không chỉ đề cập đến kỹ năng giao tiếp, mà còn khám phá sâu hơn vào các khía cạnh của sự tự tin, sự tự quản lý và mối quan hệ giữa con người. Một điểm mạnh của cuốn sách là cách tác giả trình bày thông tin một cách rõ ràng và dễ hiểu. Bằng cách sử dụng ví dụ cụ thể và câu chuyện từ cuộc sống thực tế, sách giúp người đọc hiểu rõ hơn về những nguyên tắc cơ bản của giao tiếp hiệu quả. Điều này làm cho việc áp dụng những kiến thức từ sách vào cuộc sống hàng ngày trở nên dễ dàng hơn.', 'images/Tâm Lý - Kỹ Năng Sống/kheo-an-noi-se-co-duoc-thien-ha.jpg', 'files/Tâm Lý - Kỹ Năng Sống/kheo-an-noi-se-co-duoc-thien-ha.pdf', 'l006'),
('s041', 'Đố Khéo Giảng Hay Nâng Cao Trí Tuệ', 'Thái Quỳnh Tân', 'Làm thế nào để thoát chết trong gang tấc, qua mặt được Conan Doyle, rồi biết được cả mánh cho gà ăn của Gia Cát Lượng, cách xếp bánh của Gauss v.v…? Bằng cách thể hiện sinh động dưới hình thức những mẩu chuyện nhỏ, hấp dẫn cùng những lời giải đáp ngắn gọn; cuốn sách này khiến độc giả vừa thú vị theo dõi vừa tiếp thu được những kiến thức nâng cao trí tuệ.', 'images/Tâm Lý - Kỹ Năng Sống/do-kheo-giang-hay-nang-cao-tri-tue.jpg', 'files/Tâm Lý - Kỹ Năng Sống/do-kheo-giang-hay-nang-cao-tri-tue.pdf', 'l006'),
('s042', 'Sức Mạnh Của Thói Quen', 'Charles Duhigg', 'Sức mạnh của thói quen (Power of Habits) sẽ làm bạn say mê bởi những ý tưởng thú vị, những nghiên cứu ấn tượng, những phân tích thông minh và những lời khuyên thiết thực. Những độc giả đưa cuốn sách này vào danh sách bestseller của Thời báo New York suốt 40 tuần đã kiểm chứng điều đó.', 'images/Tâm Lý - Kỹ Năng Sống/suc-manh-cua-thoi-quen.jpg', 'files/Tâm Lý - Kỹ Năng Sống/suc-manh-cua-thoi-quen.pdf', 'l006'),
('s043', 'Sức Mạnh Của Tĩnh Lặng', 'Eckhart Tolle', 'Sức mạnh của tĩnh lặng là tác phẩm tâm linh rất ngắn ngọn nhưng sâu sắc của Eckhart Tolle, tác giả được The New York Times bình chọn là một trong những tác giả có sách bán chạy nhất. Đây là một cuốn sách hữu ích và thiết thực cho những ai muốn tiếp xúc với bản chất sâu lắng, trong sáng và chân thật trong con người mình.', 'images/Tâm Lý - Kỹ Năng Sống/suc-manh-cua-tinh-lang.jpg', 'files/Tâm Lý - Kỹ Năng Sống/suc-manh-cua-tinh-lang.pdf', 'l006'),
('s044', 'Chiến Thắng Con Quỷ Trong Bạn', 'Napoleon Hill', 'Cuốn sách là cuộc trò chuyện của Napoleon Hill và Con Quỷ. Sau bao nhiêu năm miệt mài nghiên cứu cuối cùng ông cũng phát hiện ra Con Quỷ, bắt nó phải thú tội và tiết lộ những sự thật kinh hoàng về nơi nó sống, cách nó kiểm soát tâm trí con người và cách để con người chiến thắng được nó. Khi đọc cuốn sách này, có thể bạn sẽ tự hỏi, cuộc trò chuyện này có thật không? Con Quỷ là có thật hay là một sản phẩm của trí tưởng tượng của Napoleon Hill. Nhưng quyền lựa chọn cách hiểu vấn đề là của bạn. Bởi lẽ cuối cùng, thông qua cuộc trò chuyện với Con Quỷ, Napoleon Hill đã cung cấp cho chúng ta chìa khóa để chiến thắng Con Quỷ trong cuộc sống riêng của mỗi người.Hãy tận hưởng cuốn sách kỳ diệu này và chia sẻ nó với gia đình, bạn bè. Sức mạnh trong ngôn từ của Napoleon Hill có thể và sẽ thay đổi cuộc đời bạn.', 'images/Tâm Lý - Kỹ Năng Sống/chien-thang-con-quy-trong-ban.jpg', 'files/Tâm Lý - Kỹ Năng Sống/chien-thang-con-quy-trong-ban.pdf', 'l006');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favourite`
--

CREATE TABLE `favourite` (
  `email` varchar(100) NOT NULL,
  `id_book` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favourite`
--

INSERT INTO `favourite` (`email`, `id_book`) VALUES
('hannguyen00@gmail.com', 's017'),
('hannguyen00@gmail.com', 's036'),
('lenam789@gmail.com', 's002'),
('lenam789@gmail.com', 's022'),
('nghung12@gmail.com', 's010'),
('nghung12@gmail.com', 's031'),
('nghung12@gmail.com', 's040'),
('ngoc4567@gmail.com', 's002'),
('ngoc4567@gmail.com', 's015'),
('tramb2105564@student.ctu.edu.vn', 's002'),
('tramb2105564@student.ctu.edu.vn', 's003'),
('tramb2105564@student.ctu.edu.vn', 's016'),
('tramle055@gmail.com', 's001'),
('tramle055@gmail.com', 's002'),
('tramle055@gmail.com', 's011'),
('tramle055@gmail.com', 's012');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genre`
--

CREATE TABLE `genre` (
  `id_genre` varchar(10) NOT NULL,
  `name_genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `genre`
--

INSERT INTO `genre` (`id_genre`, `name_genre`) VALUES
('l001', 'Ẩm thực - Nấu ăn'),
('l002', 'Y Học - Sức Khỏe'),
('l003', 'Truyện Cười - Tiếu Lâm'),
('l004', 'Văn Học Việt Nam'),
('l005', 'Thư Viện Pháp Luật'),
('l006', 'Tâm Lý - Kỹ Năng Sống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `readinghistory`
--

CREATE TABLE `readinghistory` (
  `date_reading` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_book` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `readinghistory`
--

INSERT INTO `readinghistory` (`date_reading`, `email`, `id_book`) VALUES
('2024-04-29', 'hannguyen00@gmail.com', 's002'),
('2024-04-29', 'hannguyen00@gmail.com', 's017'),
('2024-04-29', 'hannguyen00@gmail.com', 's020'),
('2024-04-29', 'hannguyen00@gmail.com', 's028'),
('2024-04-29', 'lenam789@gmail.com', 's001'),
('2024-04-29', 'lenam789@gmail.com', 's002'),
('2024-04-29', 'lenam789@gmail.com', 's012'),
('2024-04-29', 'lenam789@gmail.com', 's015'),
('2024-04-29', 'lenam789@gmail.com', 's017'),
('2024-04-29', 'lenam789@gmail.com', 's021'),
('2024-04-29', 'lenam789@gmail.com', 's022'),
('2024-04-29', 'lenam789@gmail.com', 's030'),
('2024-04-29', 'lenam789@gmail.com', 's036'),
('2024-04-29', 'nghung12@gmail.com', 's010'),
('2024-04-29', 'nghung12@gmail.com', 's018'),
('2024-04-29', 'nghung12@gmail.com', 's022'),
('2024-04-29', 'nghung12@gmail.com', 's024'),
('2024-04-29', 'nghung12@gmail.com', 's031'),
('2024-04-29', 'nghung12@gmail.com', 's035'),
('2024-04-29', 'ngoc4567@gmail.com', 's002'),
('2024-04-29', 'ngoc4567@gmail.com', 's007'),
('2024-04-27', 'ngoc4567@gmail.com', 's010'),
('2024-04-29', 'ngoc4567@gmail.com', 's015'),
('2024-04-27', 'ngoc4567@gmail.com', 's021'),
('2024-04-29', 'ngoc4567@gmail.com', 's022'),
('2024-04-29', 'tramb2105564@student.ctu.edu.vn', 's002'),
('2024-05-01', 'tramb2105564@student.ctu.edu.vn', 's019'),
('2024-05-01', 'tramb2105564@student.ctu.edu.vn', 's020'),
('2024-04-29', 'tramb2105564@student.ctu.edu.vn', 's022'),
('2024-04-29', 'tramb2105564@student.ctu.edu.vn', 's035'),
('2024-04-27', 'tramle055@gmail.com', 's001'),
('2024-04-29', 'tramle055@gmail.com', 's002'),
('2024-04-26', 'tramle055@gmail.com', 's009'),
('2024-04-29', 'tramle055@gmail.com', 's010'),
('2024-04-25', 'tramle055@gmail.com', 's015'),
('2024-04-29', 'tramle055@gmail.com', 's017');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id_review` int(10) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_review` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_book` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`id_review`, `content`, `date_review`, `email`, `id_book`) VALUES
(2, 'sách rất hay và bổ ích.', '2024-04-24', 'tramle055@gmail.com', 's002'),
(3, 'Sách giúp tôi giải trí sau những giờ làm việc căng thẳng. Nội dung rất hài hước.', '2024-04-24', 'tramle055@gmail.com', 's017'),
(4, 'Sách rất bổ ích.', '2024-04-24', 'tramle055@gmail.com', 's010'),
(5, 'Sách đã giúp tôi nấu được nhiều món ngon cho con của tôi. Sách rất bổ ích.', '2024-04-24', 'lenam789@gmail.com', 's001'),
(6, 'Sách hay', '2024-04-24', 'lenam789@gmail.com', 's002'),
(7, 'truyện rất hài hước', '2024-04-24', 'lenam789@gmail.com', 's017'),
(8, 'nội dung bổ ích', '2024-04-24', 'lenam789@gmail.com', 's030'),
(9, 'Hãy thử sống một ngày bạn trân trọng mọi cung bậc cảm xúc bên trong con người bạn.', '2024-04-24', 'lenam789@gmail.com', 's036'),
(10, 'Truyện sâu sắc.', '2024-04-24', 'lenam789@gmail.com', 's022'),
(12, 'truyện rất hài hước', '2024-04-25', 'ngoc4567@gmail.com', 's015'),
(13, 'truyện rất cảm động', '2024-04-25', 'ngoc4567@gmail.com', 's022'),
(15, 'truyện thú vị lắm.', '2024-04-25', 'lenam789@gmail.com', 's015'),
(16, 'sách rất hay và hữu ích.', '2024-04-25', 'lenam789@gmail.com', 's012'),
(23, 'sách bổ ích', '2024-04-28', 'nghung12@gmail.com', 's031'),
(24, 'truyện rất hay', '2024-04-28', 'nghung12@gmail.com', 's022'),
(25, 'Trong quyển sách này tôi đã tìm được một cái nhìn mới thay đổi toàn bộ nếp nghĩ, nếp sống và cách rèn luyện sức khỏe.', '2024-04-29', 'nghung12@gmail.com', 's010'),
(26, 'truyện hài hước', '2024-04-29', 'nghung12@gmail.com', 's018'),
(27, 'Truyện phản ánh xã hội đương thời.', '2024-04-29', 'lenam789@gmail.com', 's021'),
(28, 'cách viết súc tích và thuyết phục', '2024-04-29', 'nghung12@gmail.com', 's035'),
(29, 'sách giúp tôi nấu được nhiều món ngon.', '2024-04-29', 'ngoc4567@gmail.com', 's002'),
(30, 'Cuốn sách này giúp tôi nâng cao tay nghề nấu nướng của mình', '2024-04-29', 'ngoc4567@gmail.com', 's007'),
(31, 'sách hay', '2024-04-29', 'nghung12@gmail.com', 's024'),
(32, 'tác phẩm hay và nổi tiếng nhất của nền văn chương Việt Nam', '2024-04-29', 'hannguyen00@gmail.com', 's028'),
(33, 'Ngôn ngữ trong các câu chuyện phần lớn là ngôn ngữ đời sống hàng ngày', '2024-04-29', 'hannguyen00@gmail.com', 's020'),
(34, 'công thức chỉ rất đơn giản dễ làm', '2024-04-29', 'hannguyen00@gmail.com', 's002'),
(35, 'Hướng dẫn rất chi tiết.', '2024-04-29', 'tramb2105564@student.ctu.edu.vn', 's002'),
(36, 'truyện rất hay', '2024-05-01', 'tramb2105564@student.ctu.edu.vn', 's019'),
(37, 'Truyện tái hiện đời sống những năm chiến tranh hay và sâu sắc', '2024-05-01', 'tramb2105564@student.ctu.edu.vn', 's022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`email`, `fullname`, `password`, `role`) VALUES
('admin123@gmail.com', 'admin', '$2y$10$wMDqe4CymdiP1A6UgQwiY.1rbXfM5Zb7/pGUWWHKNuqWKntZL0O3a', 'admin'),
('hannguyen00@gmail.com', 'Nguyễn Ngọc Hân', '$2y$10$L.fEiAd7zOZq/Kwbxypgu.qAetLSjz5LOfwwUTGy/.lXl1Aj.mEW.', ''),
('lenam789@gmail.com', 'Lê Thanh Nam', '$2y$10$BnU4h5OW.1R2cQfNyuKkT.Y0C6Qu45Nm/6DyPX6rvar6EWzCuKR5q', ''),
('nghung12@gmail.com', 'Nguyễn Quốc Hưng', '$2y$10$dwqkNZs4tuwJc1I9SRs/qOWRub4wYkX8noWRyUW4tHhzKbN39LXHK', ''),
('ngoc4567@gmail.com', 'Lê Kim Ngọc', '$2y$10$O./Yrbv67BqJHwve.B8wL.HQsALAPtp6L/w91EfZteXpssPQd0JMG', ''),
('tramb2105564@student.ctu.edu.vn', 'Lê Thị Ngọc Trâm', '$2y$10$6iMum94g.DFfGUBMOtV1meAPx/G4S80cGenLyPN7bwytzouqxCnGK', ''),
('tramle055@gmail.com', 'Lê Ngọc Trâm', '$2y$10$cXHk.nfnAe4QnAL3Q3a7JeyYefPdppTZE.FaPjiZC5Q0r7axJPja2', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Chỉ mục cho bảng `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`email`,`id_book`),
  ADD KEY `email` (`email`),
  ADD KEY `id_book` (`id_book`);

--
-- Chỉ mục cho bảng `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Chỉ mục cho bảng `readinghistory`
--
ALTER TABLE `readinghistory`
  ADD PRIMARY KEY (`email`,`id_book`),
  ADD KEY `email` (`email`),
  ADD KEY `id_book` (`id_book`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `email` (`email`),
  ADD KEY `id_book` (`id_book`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);

--
-- Các ràng buộc cho bảng `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`);

--
-- Các ràng buộc cho bảng `readinghistory`
--
ALTER TABLE `readinghistory`
  ADD CONSTRAINT `readinghistory_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `readinghistory_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`);

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
