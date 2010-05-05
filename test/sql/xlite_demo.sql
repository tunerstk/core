
-- Categories

INSERT INTO xlite_categories SET `category_id` = '14015', `parent` = '0', `name` = 'Fruit', `description` = 'Category-1', `order_by` = '10', `image` = 'demo_c14015.jpeg', `image_height` = '92', `image_width` = '160', `image_type` = 'image/jpeg', `image_size` = '9201', `image_source` = 'F';
INSERT INTO xlite_categories SET `category_id` = '14009', `parent` = '0', `name` = 'Vegetables', `order_by` = '20', `image` = 'demo_c14009.jpeg', `image_height` = '127', `image_width` = '160', `image_type` = 'image/jpeg', `image_size` = '10863', `image_source` = 'F';

-- Products [9]

INSERT INTO xlite_products SET `product_id` = '15090', `enabled` = '1', `name` = 'Apple', `description` = '<h5>Apple</h5>\n<p>The apple is the pomaceous fruit of the apple tree, species Malus domestica in the rose family Rosaceae. It is one of the most widely cultivated tree fruits. The tree is small and deciduous, reaching 3 to 12 metres (9.8 to 39 ft) tall, with a broad, often densely twiggy crown. The leaves are alternately arranged simple ovals 5 to 12 cm long and 3&ndash;6 centimetres (1.2&ndash;2.4 in) broad on a 2 to 5 centimetres (0.79 to 2.0 in) petiole with an acute tip, serrated margin and a slightly downy underside. Blossoms are produced in spring simultaneously with the budding of the leaves. The flowers are white with a pink tinge that gradually fades, five petaled, and 2.5 to 3.5 centimetres (0.98 to 1.4 in) in diameter. The fruit matures in autumn, and is typically 5 to 9 centimetres (2.0 to 3.5 in) diameter. The center of the fruit contains five carpels arranged in a five-point star, each carpel containing one to three seeds.</p>\n<p>The tree originated from Central Asia, where its wild ancestor is still found today. There are more than 7,500 known cultivars of apples resulting in a range of desired characteristics. Cultivars vary in their yield and the ultimate size of the tree, even when grown on the same rootstock.</p>\n<p>vAt least 55 million tonnes of apples were grown worldwide in 2005, with a value of about $10 billion. China produced about 35% of this total. The United States is the second leading producer, with more than 7.5% of the world production. Turkey, France, Italy, and Iran are also among the leading apple exporters.</p>\n<p>&nbsp;</p>\n<div style=\"padding: 24px 24px 24px 21px; display: block; background-color: #ececec;\">From <a style=\"color: #1e7ec8; text-decoration: underline;\" title=\"Wikipedia\" href=\"http://en.wikipedia.org\">Wikipedia</a>, the free encyclopedia</div>', `price` = '1.99', `sale_price` = '1.99', `sku` = '00000', `weight` = '0.32', `image` = 'demo_p15090.jpeg', `image_height` = '476', `image_width` = '500', `image_type` = 'image/jpeg', `image_size` = '125664', `image_source` = 'F', `thumbnail` = 'demo_t15090.jpeg', `thumbnail_height` = '152', `thumbnail_width` = '160', `thumbnail_type` = 'image/jpeg', `thumbnail_size` = '12605', `thumbnail_source` = 'F';
INSERT INTO xlite_product_links SET `product_id` = '15090', `category_id` = '14015';
INSERT INTO xlite_product_options SET `product_id` = '15090', `optclass` = 'Color', `opttext` = 'Color', `categories` = 'Radio button', `options` = 'Red\nGreen\nYellow';
INSERT INTO xlite_product_options SET `product_id` = '15090', `optclass` = 'Size', `opttext` = 'Size', `categories` = 'Radio button', `options` = 'Small\nBig';
INSERT INTO xlite_products SET `product_id` = '16281', `enabled` = '1', `name` = 'Radish', `description` = '<h5>Radish</h5>\n<p>The radish (Raphanus sativus) is an edible root vegetable of the Brassicaceae family that was domesticated in Europe in pre-Roman times. They are grown and consumed throughout the world. Radishes have numerous varieties, varying in size, color and duration of required cultivation time. There are some radishes that are grown for their seeds; oilseed radishes are grown, as the name implies, for oil production.</p>\n<p>&nbsp;</p>\n<div style=\"padding: 24px 24px 24px 21px; display: block; background-color: #ececec;\">From <a style=\"color: #1e7ec8; text-decoration: underline;\" title=\"Wikipedia\" href=\"http://en.wikipedia.org\">Wikipedia</a>, the free encyclopedia</div>', `price` = '1.15', `sale_price` = '1.15', `sku` = '00007', `weight` = '0.31', `image` = 'demo_p16281.jpeg', `image_height` = '449', `image_width` = '480', `image_type` = 'image/jpeg', `image_size` = '147088', `image_source` = 'F', `thumbnail` = 'demo_t16281.jpeg', `thumbnail_height` = '150', `thumbnail_width` = '160', `thumbnail_type` = 'image/jpeg', `thumbnail_size` = '12191', `thumbnail_source` = 'F';
INSERT INTO xlite_product_links SET `product_id` = '16281', `category_id` = '14009';
INSERT INTO xlite_products SET `product_id` = '16280', `enabled` = '1', `name` = 'Pea', `description` = '<h5>Pea</h5>\n<p>A pea is most commonly the small spherical seed or the seed-pod of the legume Pisum sativum. Each pod contains several peas. Although it is botanically a fruit, it is treated as a vegetable in cooking. The name is also used to describe other edible seeds from the Fabaceae such as the pigeon pea (Cajanus cajan), the cowpea (Vigna unguiculata), and the seeds from several species of Lathyrus.</p>\n<p>P. sativum is an annual plant, with a life cycle of one year. It is a cool season crop grown in many parts of the world; planting can take place from winter through to early summer depending on location. The average pea weighs between 0.1 and 0.36 grams. The species is used as a vegetable - fresh, frozen or canned, and is also grown to produce dry peas like the split pea. These varieties are typically called field peas.</p>\n<p>The wild pea is restricted to the Mediterranean basin and the Near East. The earliest archaeological finds of peas come from Neolithic Syria, Turkey and Jordan. In Egypt, early finds come from c. 4800&ndash;4400 BC in the delta area, and from c. 3800&ndash;3600 BC in Upper Egypt. The pea was also present in 5th millennium BC Georgia. Further east, the finds are younger. Pea remains were retrieved from Afghanistan c. 2000 BC. They were present in 2250&ndash;1750 BC Harappa Pakistan and north-west India, from the older phases of this culture onward. In the second half of the 2nd millennium BC this pulse crop appears in the Gangetic basin and southern India.</p>\n<p>&nbsp;</p>\n<div style=\"padding: 24px 24px 24px 21px; display: block; background-color: #ececec;\">From <a style=\"color: #1e7ec8; text-decoration: underline;\" title=\"Wikipedia\" href=\"http://en.wikipedia.org\">Wikipedia</a>, the free encyclopedia</div>', `price` = '3.45', `sale_price` = '3.45', `sku` = '00006', `weight` = '0.55', `image` = 'demo_p16280.jpeg', `image_height` = '320', `image_width` = '480', `image_type` = 'image/jpeg', `image_size` = '89674', `image_source` = 'F', `thumbnail` = 'demo_t16280.jpeg', `thumbnail_height` = '107', `thumbnail_width` = '160', `thumbnail_type` = 'image/jpeg', `thumbnail_size` = '8073', `thumbnail_source` = 'F';
INSERT INTO xlite_product_links SET `product_id` = '16280', `category_id` = '14009';
INSERT INTO xlite_products SET `product_id` = '16282', `enabled` = '1', `name` = 'Cucumber', `description` = '<h5>Cucumber</h5>\n<p>The cucumber (Cucumis sativus) is a widely cultivated plant in the gourd family Cucurbitaceae, which includes squash, and in the same genus as the muskmelon.</p>\n<p>&nbsp;</p>\n<div style=\"padding: 24px 24px 24px 21px; display: block; background-color: #ececec;\">From <a style=\"color: #1e7ec8; text-decoration: underline;\" title=\"Wikipedia\" href=\"http://en.wikipedia.org\">Wikipedia</a>, the free encyclopedia</div>', `price` = '1.12', `sale_price` = '1.12', `sku` = '00008', `weight` = '0.35', `image` = 'demo_p16282.jpeg', `image_height` = '381', `image_width` = '480', `image_type` = 'image/jpeg', `image_size` = '152246', `image_source` = 'F', `thumbnail` = 'demo_t16282.jpeg', `thumbnail_height` = '127', `thumbnail_width` = '160', `thumbnail_type` = 'image/jpeg', `thumbnail_size` = '10863', `thumbnail_source` = 'F';
INSERT INTO xlite_product_links SET `product_id` = '16282', `category_id` = '14009';
INSERT INTO xlite_products SET `product_id` = '15121', `enabled` = '1', `name` = 'Cherry', `description` = '<h5>Cherry</h5>\n<p>The word cherry refers to a fleshy fruit (drupe) that contains a single stony seed. The cherry belongs to the family Rosaceae, genus Prunus, along with almonds, peaches, plums, apricots and bird cherries. The subgenus, Cerasus, is distinguished by having the flowers in small corymbs of several together (not singly, nor in racemes), and by having a smooth fruit with only a weak groove or none along one side. The subgenus is native to the temperate regions of the Northern Hemisphere, with two species in America, three in Europe, and the remainder in Asia.</p>\n<p>&nbsp;</p>\n<div style=\"padding: 24px 24px 24px 21px; display: block; background-color: #ececec;\">From <a style=\"color: #1e7ec8; text-decoration: underline;\" title=\"Wikipedia\" href=\"http://en.wikipedia.org\">Wikipedia</a>, the free encyclopedia</div>', `price` = '5.99', `sale_price` = '5.99', `sku` = '00004', `weight` = '0.32', `image` = 'demo_p15121.jpeg', `image_height` = '461', `image_width` = '480', `image_type` = 'image/jpeg', `image_size` = '148125', `image_source` = 'F', `thumbnail` = 'demo_t15121.jpeg', `thumbnail_height` = '154', `thumbnail_width` = '160', `thumbnail_type` = 'image/jpeg', `thumbnail_size` = '13303', `thumbnail_source` = 'F';
INSERT INTO xlite_inventories SET `inventory_id` = '15121', `amount` = '2000', `enabled` = '1', `low_avail_limit` = '50';
INSERT INTO xlite_product_links SET `product_id` = '15121', `category_id` = '14015';
INSERT INTO xlite_product_options SET `product_id` = '15121', `optclass` = 'Size', `opttext` = 'Size', `categories` = 'Radio button', `options` = 'Small\nBig';
INSERT INTO xlite_products SET `product_id` = '15123', `enabled` = '1', `name` = 'Strawberry', `description` = '<h5>Garden strawberry</h5>\n<p>Garden strawberries are a common variety of strawberry cultivated worldwide. Like other species of Fragaria (strawberries), it belongs to the family Rosaceae. Technically, it is not a fruit but a false fruit, meaning the fleshy part is derived not from the plant\'s ovaries (achenes) but from the peg at the bottom of the bowl-shaped hypanthium that holds the ovaries.</p>\n<p>The Garden Strawberry was first bred in Brittany, France in 1740 via a cross of Fragaria virginiana from eastern North America , which was noted for its flavor, and Fragaria chiloensis from Chile brought by Am&eacute;d&eacute;e-Fran&ccedil;ois_Fr&eacute;zier, which was noted for its large size.</p>\n<p>Cultivars of Fragaria &times; ananassa have replaced, in commercial production, the Woodland Strawberry, which was the first strawberry species cultivated in the early 17th century.</p>\n<p>&nbsp;</p>\n<div style=\"padding: 24px 24px 24px 21px; display: block; background-color: #ececec;\">From <a style=\"color: #1e7ec8; text-decoration: underline;\" title=\"Wikipedia\" href=\"http://en.wikipedia.org\">Wikipedia</a>, the free encyclopedia</div>', `price` = '1.99', `sale_price` = '1.99', `sku` = '00005', `weight` = '0.32', `image` = 'demo_p15123.jpeg', `image_height` = '338', `image_width` = '480', `image_type` = 'image/jpeg', `image_size` = '136546', `image_source` = 'F', `thumbnail` = 'demo_t15123.jpeg', `thumbnail_height` = '113', `thumbnail_width` = '160', `thumbnail_type` = 'image/jpeg', `thumbnail_size` = '10966', `thumbnail_source` = 'F';
INSERT INTO xlite_product_links SET `product_id` = '15123', `category_id` = '14015';
INSERT INTO xlite_product_options SET `product_id` = '15123', `optclass` = 'Choice', `opttext` = 'Choice', `categories` = 'Radio button', `options` = 'Garden\nWild=+3';
INSERT INTO xlite_products SET `product_id` = '15068', `enabled` = '1', `name` = 'Orange', `description` = '<h5>Orange</h5>\n<p>An orange&mdash;specifically, the sweet orange&mdash;is the citrus Citrus &times;sinensis (syn. Citrus aurantium L. var. dulcis L., or Citrus aurantium Risso) and its fruit. The orange is a hybrid of ancient cultivated origin, possibly between pomelo (Citrus maxima) and tangerine (Citrus reticulata). It is a small flowering tree growing to about 10 m tall with evergreen leaves, which are arranged alternately, of ovate shape with crenulate margins and 4&ndash;10 cm long. The orange fruit is a hesperidium, a type of berry.</p>\n<p>Oranges originated in Southeast Asia. The fruit of Citrus sinensis is called sweet orange to distinguish it from Citrus aurantium, the bitter orange. The name is thought to ultimately derive from the Dravidian and Telugu word for the orange tree, with its final form developing after passing through numerous intermediate languages.</p>\n<p>In a number of languages, it is known as a \"Chinese apple\" (e.g. Dutch Sinaasappel, \"China\'s apple\", or \"Apfelsine\" in German).</p>\n<p>&nbsp;</p>\n<div style=\"padding: 24px 24px 24px 21px; display: block; background-color: #ececec;\">From <a style=\"color: #1e7ec8; text-decoration: underline;\" title=\"Wikipedia\" href=\"http://en.wikipedia.org\">Wikipedia</a>, the free encyclopedia</div>', `price` = '2.99', `sale_price` = '2.99', `sku` = '00003', `weight` = '0.32', `image` = 'demo_p15068.jpeg', `image_height` = '480', `image_width` = '480', `image_type` = 'image/jpeg', `image_size` = '131972', `image_source` = 'F', `thumbnail` = 'demo_t15068.jpeg', `thumbnail_height` = '160', `thumbnail_width` = '160', `thumbnail_type` = 'image/jpeg', `thumbnail_size` = '7998', `thumbnail_source` = 'F';
INSERT INTO xlite_product_links SET `product_id` = '15068', `category_id` = '14015';
INSERT INTO xlite_product_options SET `product_id` = '15068', `optclass` = 'Size', `opttext` = 'Size', `categories` = 'Radio button', `options` = 'Small\nMedium\nBig';
INSERT INTO xlite_products SET `product_id` = '15091', `enabled` = '1', `name` = 'Peach', `description` = '<h5>Peach</h5>\n<p>The peach (Prunus persica) is known as a species of Prunus native to China that bears an edible juicy fruit also called a peach. It is a deciduous tree growing to 5&ndash;10 m tall, belonging to the subfamily Prunoideae of the family Rosaceae. It is classified with the almond in the subgenus Amygdalus within the genus Prunus, distinguished from the other subgenera by the corrugated seed shell.</p>\n<p>The leaves are lanceolate, 7&ndash;15 cm long (3&ndash;6 in), 2&ndash;3 cm broad, pinnately veined. The flowers are produced in early spring before the leaves; they are solitary or paired, 2.5&ndash;3 cm diameter, pink, with five petals. The fruit has yellow or whitish flesh, a delicate aroma, and a skin that is either velvety (peaches) or smooth (nectarines) in different cultivars. The flesh is very delicate and easily bruised in some cultivars, but is fairly firm in some commercial varieties, especially when green. The single, large seed is red-brown, oval shaped, approximately 1.3&ndash;2 cm long, and is surrounded by a wood-like husk. Peaches, along with cherries, plums and apricots, are stone fruits (drupes). The tree is small, and up to 15 ft tall.</p>\n<p>The scientific name persica, along with the word \"peach\" itself and its cognates in many European languages, derives from an early European belief that peaches were native to Persia (now Iran). The modern botanical consensus is that they originate in China, and were introduced to Persia and the Mediterranean region along the Silk Road before Christian times.[1] Cultivated peaches are divided into clingstones and freestones, depending on whether the flesh sticks to the stone or not; both can have either white or yellow flesh. Peaches with white flesh typically are very sweet with little acidity, while yellow-fleshed peaches typically have an acidic tang coupled with sweetness, though this also varies greatly. Both colours often have some red on their skin. Low-acid white-fleshed peaches are the most popular kinds in China, Japan, and neighbouring Asian countries, while Europeans and North Americans have historically favoured the acidic, yellow-fleshed kinds.</p>\n<p>&nbsp;</p>\n<div style=\"padding: 24px 24px 24px 21px; display: block; background-color: #ececec;\">From <a style=\"color: #1e7ec8; text-decoration: underline;\" title=\"Wikipedia\" href=\"http://en.wikipedia.org\">Wikipedia</a>, the free encyclopedia</div>', `price` = '8.99', `sale_price` = '8.99', `sku` = '00002', `weight` = '0.32', `image` = 'demo_p15091.jpeg', `image_height` = '480', `image_width` = '480', `image_type` = 'image/jpeg', `image_size` = '163746', `image_source` = 'F', `thumbnail` = 'demo_t15091.jpeg', `thumbnail_height` = '160', `thumbnail_width` = '160', `thumbnail_type` = 'image/jpeg', `thumbnail_size` = '9412', `thumbnail_source` = 'F';
INSERT INTO xlite_inventories SET `inventory_id` = '15091', `amount` = '1000', `enabled` = '1', `low_avail_limit` = '50';
INSERT INTO xlite_product_links SET `product_id` = '15091', `category_id` = '14015';
INSERT INTO xlite_product_options SET `product_id` = '15091', `optclass` = 'Size', `opttext` = 'Size', `categories` = 'Radio button', `options` = 'Small\nMedium\nBig';
INSERT INTO xlite_products SET `product_id` = '15067', `enabled` = '1', `name` = 'Pear', `description` = '<h5>Pear</h5>\n<p>The pear is an edible pomaceous fruit produced by a tree of genus Pyrus (pronounced /ˈpaɪrəs/). The pear is classified within Maloideae, a subfamily within Rosaceae. The apple (Malus &times;domestica), which it resembles in floral structure, is also a member of this subfamily.</p>\n<p>The English word pear is probably from Common West Germanic *pera, probably a loanword of Vulgar Latin pira, the plural of pirum, akin to Greek api(r)os, which is likely of Semitic origin. The place name Perry can indicate the historical presence of pear trees. The term \"pyriform\" is sometimes used to describe something which is \"pear-shaped\".!</p>\n<p>&nbsp;</p>\n<div style=\"padding: 24px 24px 24px 21px; display: block; background-color: #ececec;\">From <a style=\"color: #1e7ec8; text-decoration: underline;\" title=\"Wikipedia\" href=\"http://en.wikipedia.org\">Wikipedia</a>, the free encyclopedia</div>', `price` = '2.49', `sale_price` = '2.49', `sku` = '00001', `weight` = '0.32', `image` = 'demo_p15067.jpeg', `image_height` = '480', `image_width` = '319', `image_type` = 'image/jpeg', `image_size` = '99541', `image_source` = 'F', `thumbnail` = 'demo_t15067.jpeg', `thumbnail_height` = '160', `thumbnail_width` = '106', `thumbnail_type` = 'image/jpeg', `thumbnail_size` = '6487', `thumbnail_source` = 'F';
INSERT INTO xlite_inventories SET `inventory_id` = '15067', `amount` = '500', `enabled` = '1', `low_avail_limit` = '0';
INSERT INTO xlite_product_links SET `product_id` = '15067', `category_id` = '14015';
INSERT INTO xlite_product_options SET `product_id` = '15067', `optclass` = 'Size', `opttext` = 'Size', `categories` = 'Radio button', `options` = 'Small\nBig';

-- Orders [7]

INSERT INTO xlite_orders SET `order_id` = '1', `profile_id` = '2001', `payment_method` = 'PhoneOrdering', `status` = 'Q', `subtotal` = '8.43', `tax` = '0.0', `date` = '1248425590452', `total` = '8.43';
INSERT INTO xlite_profiles SET `profile_id` = '2001', `order_id` = '1', `login` = 'demo@litecommerce.com', `shipping_city` = 'Buffalo', `shipping_country` = 'US', `shipping_firstname` = 'Peter', `shipping_lastname` = 'Pan', `shipping_phone` = '1-877-358-2669', `shipping_zipcode` = '14202', `shipping_state` = 'NY', `shipping_address` = '17 Court St', `billing_city` = 'Buffalo', `billing_country` = 'US', `billing_firstname` = 'Peter', `billing_lastname` = 'Pan', `billing_phone` = '1-877-358-2669', `billing_zipcode` = '14202', `billing_state` = 'NY', `billing_address` = '17 Court St';
INSERT INTO xlite_order_items SET `order_id` = '1', `product_id` = '16280', `price` = '3.45', `product_name` = 'Pea', `product_sku` = '00006', `amount` = '1', `item_id` = '16280';
INSERT INTO xlite_order_items SET `order_id` = '1', `product_id` = '15068', `price` = '2.99', `product_name` = 'Orange', `product_sku` = '00003', `amount` = '1', `options` = 'a:1:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:6:\"Medium\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:1;}}', `item_id` = '15068|Size:Medium';
INSERT INTO xlite_order_items SET `order_id` = '1', `product_id` = '15090', `price` = '1.99', `product_name` = 'Apple', `product_sku` = '00000', `amount` = '1', `options` = 'a:2:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:5:\"Color\";s:6:\"option\";s:3:\"Red\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:0;}i:1;O:8:\"stdClass\":6:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:3:\"Big\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:1;}}', `item_id` = '15090|Color:Red|Size:Big';
INSERT INTO xlite_orders SET `order_id` = '2', `profile_id` = '2002', `payment_method` = 'PhoneOrdering', `status` = 'Q', `subtotal` = '36.91', `tax` = '0.0', `date` = '1248425687312', `total` = '36.91';
INSERT INTO xlite_profiles SET `profile_id` = '2002', `order_id` = '2', `login` = 'demo@litecommerce.com', `shipping_city` = 'Washington', `shipping_country` = 'US', `shipping_firstname` = 'Wendy', `shipping_lastname` = 'Darling', `shipping_phone` = '1-571-527-1011', `shipping_zipcode` = '20024', `shipping_state` = 'DC', `shipping_address` = '425 3rd St SW', `billing_city` = 'Washington', `billing_country` = 'US', `billing_firstname` = 'Wendy', `billing_lastname` = 'Darling', `billing_phone` = '1-571-527-1011', `billing_zipcode` = '20024', `billing_state` = 'DC', `billing_address` = '425 3rd St SW';
INSERT INTO xlite_order_items SET `order_id` = '2', `product_id` = '15091', `price` = '8.99', `product_name` = 'Peach', `product_sku` = '00002', `amount` = '1', `options` = 'a:1:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:6:\"Medium\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:1;}}', `item_id` = '15091|Size:Medium';
INSERT INTO xlite_order_items SET `order_id` = '2', `product_id` = '15123', `price` = '1.99', `product_name` = 'Strawberry', `product_sku` = '00005', `amount` = '5', `options` = 'a:1:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:6:\"Choice\";s:6:\"option\";s:6:\"Garden\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:0;}}', `item_id` = '15123|Choice:Garden';
INSERT INTO xlite_order_items SET `order_id` = '2', `product_id` = '15121', `price` = '5.99', `product_name` = 'Cherry', `product_sku` = '00004', `amount` = '3', `options` = 'a:1:{i:0;O:8:\"stdClass\":5:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:3:\"Red\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;}}', `item_id` = '15121|Size:Red';
INSERT INTO xlite_orders SET `order_id` = '3', `profile_id` = '2003', `payment_method` = 'PhoneOrdering', `status` = 'Q', `subtotal` = '16.07', `tax` = '0.0', `date` = '1248425748980', `total` = '16.07';
INSERT INTO xlite_profiles SET `profile_id` = '2003', `order_id` = '3', `login` = 'demo@litecommerce.com', `shipping_city` = 'Columbus', `shipping_country` = 'US', `shipping_firstname` = 'James', `shipping_lastname` = 'Hook', `shipping_phone` = '614-287-2427', `shipping_zipcode` = '43224', `shipping_state` = 'OH', `shipping_address` = '4345 Cleveland Ave', `billing_city` = 'Columbus', `billing_country` = 'US', `billing_firstname` = 'James', `billing_lastname` = 'Hook', `billing_phone` = '614-287-2427', `billing_zipcode` = '43224', `billing_state` = 'OH', `billing_address` = '4345 Cleveland Ave';
INSERT INTO xlite_order_items SET `order_id` = '3', `product_id` = '16281', `price` = '1.15', `product_name` = 'Radish', `product_sku` = '00007', `amount` = '1', `item_id` = '16281';
INSERT INTO xlite_order_items SET `order_id` = '3', `product_id` = '16280', `price` = '3.45', `product_name` = 'Pea', `product_sku` = '00006', `amount` = '4', `item_id` = '16280';
INSERT INTO xlite_order_items SET `order_id` = '3', `product_id` = '16282', `price` = '1.12', `product_name` = 'Cucumber', `product_sku` = '00008', `amount` = '1', `item_id` = '16282';
INSERT INTO xlite_orders SET `order_id` = '4', `profile_id` = '2004', `payment_method` = 'PhoneOrdering', `status` = 'Q', `subtotal` = '29.439999999999998', `tax` = '0.0', `date` = '1248425830724', `total` = '29.439999999999998';
INSERT INTO xlite_profiles SET `profile_id` = '2004', `order_id` = '4', `login` = 'demo@litecommerce.com', `shipping_city` = 'Xenia', `shipping_country` = 'US', `shipping_firstname` = 'Tinker', `shipping_lastname` = 'Bell', `shipping_phone` = '937-376-9302', `shipping_zipcode` = '45385', `shipping_state` = 'OH', `shipping_address` = '356 Home Ave', `billing_city` = 'Xenia', `billing_country` = 'US', `billing_firstname` = 'Tinker', `billing_lastname` = 'Bell', `billing_phone` = '937-376-9302', `billing_zipcode` = '45385', `billing_state` = 'OH', `billing_address` = '356 Home Ave';
INSERT INTO xlite_order_items SET `order_id` = '4', `product_id` = '15068', `price` = '2.99', `product_name` = 'Orange', `product_sku` = '00003', `amount` = '3', `options` = 'a:1:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:3:\"Big\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:2;}}', `item_id` = '15068|Size:Big';
INSERT INTO xlite_order_items SET `order_id` = '4', `product_id` = '15091', `price` = '8.99', `product_name` = 'Peach', `product_sku` = '00002', `amount` = '2', `options` = 'a:1:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:3:\"Big\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:2;}}', `item_id` = '15091|Size:Big';
INSERT INTO xlite_order_items SET `order_id` = '4', `product_id` = '15067', `price` = '2.49', `product_name` = 'Pear', `product_sku` = '00001', `amount` = '1', `options` = 'a:1:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:3:\"Big\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:1;}}', `item_id` = '15067|Size:Big';
INSERT INTO xlite_orders SET `order_id` = '5', `profile_id` = '2005', `payment_method` = 'PhoneOrdering', `status` = 'Q', `subtotal` = '32.93', `tax` = '0.0', `date` = '1248425911209', `total` = '32.93';
INSERT INTO xlite_profiles SET `profile_id` = '2005', `order_id` = '5', `login` = 'demo@litecommerce.com', `shipping_city` = 'Bridgeton', `shipping_country` = 'US', `shipping_firstname` = 'John', `shipping_lastname` = 'Darling', `shipping_phone` = '314-209-0075', `shipping_zipcode` = '63044', `shipping_state` = 'MO', `shipping_address` = '12840 Pennridge Dr', `billing_city` = 'Bridgeton', `billing_country` = 'US', `billing_firstname` = 'John', `billing_lastname` = 'Darling', `billing_phone` = '314-209-0075', `billing_zipcode` = '63044', `billing_state` = 'MO', `billing_address` = '12840 Pennridge Dr';
INSERT INTO xlite_order_items SET `order_id` = '5', `product_id` = '15090', `price` = '1.99', `product_name` = 'Apple', `product_sku` = '00000', `amount` = '2', `options` = 'a:2:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:5:\"Color\";s:6:\"option\";s:5:\"Green\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:1;}i:1;O:8:\"stdClass\":6:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:3:\"Big\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:1;}}', `item_id` = '15090|Color:Green|Size:Big';
INSERT INTO xlite_order_items SET `order_id` = '5', `product_id` = '15121', `price` = '5.99', `product_name` = 'Cherry', `product_sku` = '00004', `amount` = '4', `options` = 'a:1:{i:0;O:8:\"stdClass\":5:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:6:\"Yellow\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;}}', `item_id` = '15121|Size:Yellow';
INSERT INTO xlite_order_items SET `order_id` = '5', `product_id` = '15123', `price` = '1.99', `product_name` = 'Strawberry', `product_sku` = '00005', `amount` = '1', `options` = 'a:1:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:6:\"Choice\";s:6:\"option\";s:4:\"Wild\";s:9:\"surcharge\";s:3:\"3.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:0;s:9:\"option_id\";i:1;}}', `item_id` = '15123|Choice:Wild';
INSERT INTO xlite_orders SET `order_id` = '6', `profile_id` = '2006', `payment_method` = 'PhoneOrdering', `status` = 'Q', `subtotal` = '13.8', `tax` = '0.0', `date` = '1248426247249', `total` = '13.8';
INSERT INTO xlite_profiles SET `profile_id` = '2006', `order_id` = '6', `login` = 'demo@litecommerce.com', `shipping_city` = 'Washington', `shipping_country` = 'US', `shipping_firstname` = 'Wendy', `shipping_lastname` = 'Darling', `shipping_phone` = '1-571-527-1011', `shipping_zipcode` = '20024', `shipping_state` = 'DC', `shipping_address` = '425 3rd St SW', `billing_city` = 'Washington', `billing_country` = 'US', `billing_firstname` = 'Wendy', `billing_lastname` = 'Darling', `billing_phone` = '1-571-527-1011', `billing_zipcode` = '20024', `billing_state` = 'DC', `billing_address` = '425 3rd St SW';
INSERT INTO xlite_order_items SET `order_id` = '6', `product_id` = '16280', `price` = '3.45', `product_name` = 'Pea', `product_sku` = '00006', `amount` = '4', `item_id` = '16280';
INSERT INTO xlite_orders SET `order_id` = '7', `profile_id` = '2007', `payment_method` = 'PhoneOrdering', `status` = 'Q', `subtotal` = '24.26', `tax` = '0.0', `date` = '1248426546404', `total` = '24.26';
INSERT INTO xlite_profiles SET `profile_id` = '2007', `order_id` = '7', `login` = 'demo@litecommerce.com', `shipping_city` = 'Saint Louis', `shipping_country` = 'US', `shipping_firstname` = 'Michael', `shipping_lastname` = 'Darling', `shipping_phone` = '314-968-5373', `shipping_zipcode` = '63119', `shipping_state` = 'MO', `shipping_address` = '331 W Thornton Ave', `billing_city` = 'Saint Louis', `billing_country` = 'US', `billing_firstname` = 'Michael', `billing_lastname` = 'Darling', `billing_phone` = '314-968-5373', `billing_zipcode` = '63119', `billing_state` = 'MO', `billing_address` = '331 W Thornton Ave';
INSERT INTO xlite_order_items SET `order_id` = '7', `product_id` = '16281', `price` = '1.15', `product_name` = 'Radish', `product_sku` = '00007', `amount` = '2', `item_id` = '16281';
INSERT INTO xlite_order_items SET `order_id` = '7', `product_id` = '15090', `price` = '1.99', `product_name` = 'Apple', `product_sku` = '00000', `amount` = '2', `options` = 'a:2:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:5:\"Color\";s:6:\"option\";s:3:\"Red\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:0;}i:1;O:8:\"stdClass\":6:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:5:\"Small\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:0;}}', `item_id` = '15090|Color:Red|Size:Small';
INSERT INTO xlite_order_items SET `order_id` = '7', `product_id` = '15091', `price` = '8.99', `product_name` = 'Peach', `product_sku` = '00002', `amount` = '2', `options` = 'a:1:{i:0;O:8:\"stdClass\":6:{s:5:\"class\";s:4:\"Size\";s:6:\"option\";s:5:\"Small\";s:9:\"surcharge\";s:3:\"0.0\";s:8:\"absolute\";b:1;s:6:\"isZero\";b:1;s:9:\"option_id\";i:0;}}', `item_id` = '15091|Size:Small';
