#AnisonStationApiについて

##API使用上の注意
###本API公開に当たって、[AnisonGeneration様](http://http://anison.info/ "AnisonGeneration")が公開されている[csvデータ](http://http://anison.info/data/download.html)を使用しています。
- 本APIのデータの二次利用につきましてはAnisonGeneration様の規約に従ってご利用ください。
- AnisonGeneration様では、各種データを募集しています。ユーザー登録をすることで、各データの追加をすることができます。
- データに誤りがある場合は、[AnisonGeneration様情報修正掲示板](http://http://bbs.anison.info/)へご連絡ください。


##APIリファレンス
###Endpoint
####**`http://2ndrelaypumpstation.com/Api/v1`**

###認証
v1では認証は行わない


###API仕様概要
|httpメソッド|URL|パラメータ|Response内容
|-|-|-|-|
|GET|`/Api/v1`|なし|READMEを応答する|
|GET|`/Api/v1/programs`|なし|直近で登録された番組データを200件応答する|
|GET|`/Api/v1/programs`|title=`{任意の文字列}`|パラメータで渡された任意の文字列が、titleに関連するデータ4つのいずれかと部分一致する番組データを応答する|
|GET|`/Api/v1/programs/{id}`|なし|該当するidの番組データと付随する楽曲データを応答する|

###GET `/Api/v1/programs`

####Response例
```json

$ curl http://2ndrelaypumpstation.com/Api/v1/programs

[
    {
        "id": 14987,
        "title": "踏切時間",
        "kana_title": "フミキリジカン",
        "other_title_01": "",
        "other_title_02": "",
        "anisoninfo_program_id": 21081,
        "broadcast_start_on": "2018-04-10",
        "program_type": {
            "id": 2,
            "code": "TV",
            "name": "テレビアニメーション"
        },
        "game_genre": {
            "id": 1,
            "name": ""
        }
    },
    {
        "id": 12829,
        "title": "信長の忍び~姉川・石山篇~",
        "kana_title": "ノブナガノシノビアネガワイシヤマヘン",
        "other_title_01": "",
        "other_title_02": "",
        "anisoninfo_program_id": 21080,
        "broadcast_start_on": "2018-04-07",
        "program_type": {
            "id": 2,
            "code": "TV",
            "name": "テレビアニメーション"
        },
        "game_genre": {
            "id": 1,
            "name": ""
        }
    },

    //省略
]
```

###GET `/Api/v1/programs?title=任意の文字列`

####Response例

```json
$ curl http://2ndrelaypumpstation.com/Api/v1/programs?title=steins

[
    {
        "id": 7590,
        "title": "Steins;Gate",
        "kana_title": "シュタインズゲート",
        "other_title_01": "",
        "other_title_02": "",
        "anisoninfo_program_id": 13401,
        "broadcast_start_on": "2011-04-06",
        "program_type": {
            "id": 2,
            "code": "TV",
            "name": "テレビアニメーション"
        },
        "game_genre": {
            "id": 1,
            "name": ""
        }
    },
    {
        "id": 7591,
        "title": "Steins;Gate",
        "kana_title": "シュタインズゲート",
        "other_title_01": "",
        "other_title_02": "",
        "anisoninfo_program_id": 11970,
        "broadcast_start_on": "2009-10-15",
        "program_type": {
            "id": 3,
            "code": "GM",
            "name": "ゲーム"
        },
        "game_genre": {
            "id": 6,
            "name": "アドベンチャー"
        }
    }

    //省略
]

```

###GET `/Api/v1/programs/{id}`

####Response例
```json
$ curl http://2ndrelaypumpstation.com/Api/v1/programs/7590

[
    {
        "id": 7590,
        "title": "Steins;Gate",
        "kana_title": "シュタインズゲート",
        "other_title_01": "",
        "other_title_02": "",
        "anisoninfo_program_id": 13401,
        "broadcast_start_on": "2011-04-06",
        "songs": [
            {
                "id": 23825,
                "title": "Hacking to the Gate",
                "anisoninfo_song_id": 67986,
                "released_on": "0000-00-00"
            },
            {
                "id": 23829,
                "title": "Fake Verthandi",
                "anisoninfo_song_id": 70994,
                "released_on": "0000-00-00"
            },
            {
                "id": 23828,
                "title": "スカイクラッドの観測者",
                "anisoninfo_song_id": 59464,
                "released_on": "0000-00-00"
            },
            {
                "id": 23830,
                "title": "Another Heaven",
                "anisoninfo_song_id": 59608,
                "released_on": "0000-00-00"
            },
            {
                "id": 23827,
                "title": "刻司ル十二ノ盟約",
                "anisoninfo_song_id": 67989,
                "released_on": "0000-00-00"
            }
        ],
        "program_type": {
            "id": 2,
            "code": "TV",
            "name": "テレビアニメーション"
        },
        "game_genre": {
            "id": 1,
            "name": ""
        }
    }
]

```


###各データ構造
####program

#####概要
- 番組データ
- ゲームや劇場版等の情報もある

#####Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|program_id|6
title|string|番組タイトル||
kana_title|string|番組タイトルの読み仮名|
other_title_01|string|番組タイトル予備枠01||
other_title_01|string|番組タイトル予備枠02||
program_type|program_type|番組種別||
game_genre|game_genre|ゲームのジャンル種別。ゲーム以外の場合も該当なしのデータが入る||
anisoninfo_program_id|Number|[AnisonGeneration](http://http://anison.info/ "AnisonGeneration")上の管理番号|
broadcast_start_on|Date|放送開始年月日(yyyy-MM-dd)ゲームの場合は発売日、劇場版の場合は公開日||

####program_type
#####概要
- 番組種別（TVアニメーション、ゲーム、劇場版など）

#####Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|program_type_id|6
code|string|番組種別コード|
name|string|番組種別名称|


####game_genre
#####概要
- ゲームのジャンル種別（RPG、アクション、アドベンチャーなど）
- 番組種別がゲームでない場合は

#####Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|game_genre_id|6
name|string|ゲームジャンル名称|

####song
#####概要
- 楽曲データ

#####Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|song_id|1000
title|string|楽曲タイトル||
anisoninfo_song_id|Number|[AnisonGeneration](http://http://anison.info/ "AnisonGeneration")上の管理番号||
singer|singer|歌手||
program|program|タイアップ番組のデータ|
song_role|song_role|楽曲の役割(OP、EDなど)||

####singer
#####概要
- 歌手データ

#####Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|song_id|1000
name|string|歌手名||

####song_role
#####概要
- 楽曲の役割種別データ

#####Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|song_id|1
code|string|楽曲の役割種別コード|
name|string|楽曲の役割種別名称||
