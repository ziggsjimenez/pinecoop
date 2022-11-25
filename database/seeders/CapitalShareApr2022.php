<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CapitalShareApr2022 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            ['account_id'=>1,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>2,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>3,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>4,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>5,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>6,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>7,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>8,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>9,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>10,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>11,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>12,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>13,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>14,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>15,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>16,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>17,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>18,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>19,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>20,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>21,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>22,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>23,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>24,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>25,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>26,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>27,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>28,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>29,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>30,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>31,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>32,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>33,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>34,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>35,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>36,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>37,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>38,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>39,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>40,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>41,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>42,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>43,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>44,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>45,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>46,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>47,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>48,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>49,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>50,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>51,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>52,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>53,'amount'=>-20772.16,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>54,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>55,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>56,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>57,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>58,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>59,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>60,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>61,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>62,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>63,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>64,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>65,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>66,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>67,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>68,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>69,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>70,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>71,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>72,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>73,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>74,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>75,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>76,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>77,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>78,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>79,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>80,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>81,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>82,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>83,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>84,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>85,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>86,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>87,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>88,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>89,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>90,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>91,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>92,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>93,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>94,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>95,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>96,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>97,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>98,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>99,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>100,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>101,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>102,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>103,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>104,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>105,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>106,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>107,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>108,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>109,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>110,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>111,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>112,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>113,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>114,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>115,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>116,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>117,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>118,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>119,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>120,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>121,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>122,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>123,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>124,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>125,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>126,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>127,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>128,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>129,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>130,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>131,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>132,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>133,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>134,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>135,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>136,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>137,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>138,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>139,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>140,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>141,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>142,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>143,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>144,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>145,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>146,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>147,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>148,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>149,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>150,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>151,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>152,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>153,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>154,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>155,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>156,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>157,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>158,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>159,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>160,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>161,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>162,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>163,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>164,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>165,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>166,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>167,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>168,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>169,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>170,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>171,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>172,'amount'=>-9500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>173,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>174,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>175,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>176,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>177,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>178,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>179,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>180,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>181,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>182,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>183,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>184,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>185,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>186,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>187,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>188,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>189,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>190,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>191,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>192,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>193,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>194,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>195,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>196,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>197,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>198,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>199,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>200,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>201,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>202,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>203,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>204,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>205,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>206,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>207,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>208,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>209,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>210,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>211,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>212,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>213,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>214,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>215,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>216,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>217,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>218,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>219,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>220,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>221,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>222,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>223,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>224,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>225,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>226,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>227,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>228,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>229,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>230,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>231,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>232,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>233,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>234,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>235,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>236,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>237,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>238,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>239,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>240,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>241,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>242,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>243,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>244,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>245,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>246,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>247,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>248,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>249,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>250,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>251,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>252,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>253,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>254,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>255,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>256,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>257,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>258,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>259,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>260,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>261,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>262,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>263,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>264,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>265,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>266,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>267,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>268,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>269,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>270,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>271,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>272,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>273,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>274,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>275,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>276,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>277,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>278,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>279,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>280,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>281,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>282,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>283,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>284,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>285,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>286,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>287,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>288,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>289,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>290,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>291,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>292,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>293,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>294,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>295,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>296,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>297,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>298,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>299,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>300,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>301,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>302,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>303,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>304,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>305,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>306,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>307,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>308,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>309,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>310,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>311,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>312,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>313,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>314,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>315,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>316,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>317,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>318,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>319,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>320,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>321,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>322,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>323,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>324,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>325,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>326,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>327,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>328,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>329,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>330,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>331,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>332,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>333,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>334,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>335,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>336,'amount'=>-500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>337,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>338,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>339,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>340,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>341,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>342,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>343,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>344,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>345,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>346,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>347,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>348,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>349,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>350,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>351,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>352,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>353,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>354,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>355,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>356,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>357,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>358,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>359,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>360,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>361,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>362,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>363,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>364,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>365,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>366,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>367,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>368,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>369,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>370,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>371,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>372,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>373,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>374,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>375,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>376,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>377,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>378,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>379,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>380,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>381,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>382,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>383,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>384,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>385,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>386,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>387,'amount'=>300,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>388,'amount'=>500,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>389,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>390,'amount'=>0,'dateoftransaction'=>'2022-04-30'],
            ['account_id'=>391,'amount'=>300,'dateoftransaction'=>'2022-04-30'],             
        ];



        foreach ($transactions as $transaction) {

            if ($transaction['amount'] != 0) {
                DB::table('transactions')->insert([
                    'transaction_reference_number' => "CAP" . "20220430" . Str::padLeft($transaction['account_id'], 5, '0'),
                    'amount' => $transaction['amount'],
                    'dateoftransaction' => $transaction['dateoftransaction'],
                    'account_id' => $transaction['account_id'],
                    'user_id' => 1,
                ]);
            }
        }
    }
}
