# AnisonStationApiについて

## API使用上の注意
### 本API公開に当たって、[AnisonGeneration様](http://anison.info/ "AnisonGeneration")が公開されている[csvデータ](http://anison.info/data/download.html)を使用しています。
- 本APIのデータの二次利用につきましてはAnisonGeneration様の規約に従ってご利用ください。
- AnisonGeneration様では、各種データを募集しています。ユーザー登録をすることで、各データの追加をすることができます。
- データに誤りがある場合は、[AnisonGeneration様情報修正掲示板](http://bbs.anison.info/)へご連絡ください。


## APIリファレンス
### Endpoint
#### **`http://2ndrelaypumpstation.net/Api/v1`**

### 認証
v1では認証は行わない


### API仕様概要
|httpメソッド|URL|パラメータ|Response内容
|-|-|-|-|
|GET|`/Api/v1`|なし|READMEを応答する|
|GET|`/Api/v1/programs`|なし|直近で登録された番組データを200件応答する|
|GET|`/Api/v1/programs`|title=`{任意の文字列}`|パラメータで渡された任意の文字列が、titleに関連するデータ4つのいずれかと部分一致する番組データを応答する|
|GET|`/Api/v1/programs/{id}`|なし|該当するidの番組データと付随する楽曲データを応答する|
|GET|`/Api/v1/programs/tvanimes/{year}`|なし|該当する年に放送開始したTVアニメ一覧を応答する|
|GET|`/Api/v1/programs/tvanimes/{year}/{season_id}`|なし|該当するクールに放送開始したTVアニメ一覧を応答する。season_idは1:冬、2.春、3.夏、4.秋|
|GET|`/Api/v1/songs`|なし|直近で登録された楽曲データを200件応答する|
|GET|`/Api/v1/songs`|title=`{任意の文字列}`|パラメータで渡された任意の文字列が、titleと部分一致する楽曲データを10000件まで応答する|
|GET|`/Api/v1/songs/{id}`|なし|該当するidの楽曲データを応答する|
|GET|`/Api/v1/singers`|name=`{任意の文字列}`|パラメータで渡された任意の文字列が、nameと部分一致する歌手データを応答する|
|GET|`/Api/v1/singers/{id}`|なし|該当するidの歌手データと楽曲データを応答する|

### GET `/Api/v1/programs`

#### Response例
```json

$ curl http://2ndrelaypumpstation.net/Api/v1/programs

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

### GET `/Api/v1/programs?title=任意の文字列`

#### Response例

```json
$ curl http://2ndrelaypumpstation.net/Api/v1/programs?title=steins

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

### GET `/Api/v1/programs/{id}`

#### Response例
```json
$ curl http://2ndrelaypumpstation.net/Api/v1/programs/7590

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
    },
    "songs": [
        {
            "id": 23825,
            "title": "Hacking to the Gate",
            "anisoninfo_song_id": 67986,
            "song_role": {
                "id": 1,
                "code": "OP",
                "name": "オープニングテーマ"
            },
            "singer": {
                "id": 3363,
                "name": "いとうかなこ"
            }
        },
        {
            "id": 23829,
            "title": "Fake Verthandi",
            "anisoninfo_song_id": 70994,
            "song_role": {
                "id": 2,
                "code": "ED",
                "name": "エンディングテーマ"
            },
            "singer": {
                "id": 6,
                "name": "(インストゥルメンタル)"
            }
        },
        {
            "id": 23828,
            "title": "スカイクラッドの観測者",
            "anisoninfo_song_id": 59464,
            "song_role": {
                "id": 2,
                "code": "ED",
                "name": "エンディングテーマ"
            },
            "singer": {
                "id": 3363,
                "name": "いとうかなこ"
            }
        },
        {
            "id": 23830,
            "title": "Another Heaven",
            "anisoninfo_song_id": 59608,
            "song_role": {
                "id": 2,
                "code": "ED",
                "name": "エンディングテーマ"
            },
            "singer": {
                "id": 3363,
                "name": "いとうかなこ"
            }
        },
        {
            "id": 23827,
            "title": "刻司ル十二ノ盟約",
            "anisoninfo_song_id": 67989,
            "song_role": {
                "id": 2,
                "code": "ED",
                "name": "エンディングテーマ"
            },
            "singer": {
                "id": 4958,
                "name": "ファンタズム"
            }
        }
    ]
}


```

### GET　`/Api/v1/programs/tvanimes/{year}`

#### Response例
```json
$ curl http://2ndrelaypumpstation.net/Api/v1/tvanimes/2017
[
    {
        "id": 151,
        "title": "ID-0",
        "kana_title": "アイディーゼロ",
        "other_title_01": "",
        "other_title_02": "",
        "anisoninfo_program_id": 20170,
        "broadcast_start_on": "2017-04-09",
        "program_type": {
            "id": 2,
            "code": "TV",
            "name": "テレビアニメーション"
        }
    },
    {
        "id": 176,
        "title": "アイドル事変",
        "kana_title": "アイドルジヘン",
        "other_title_01": "Idol Incidents",
        "other_title_02": "アイドルインシデンツ",
        "anisoninfo_program_id": 19800,
        "broadcast_start_on": "2017-01-08",
        "program_type": {
            "id": 2,
            "code": "TV",
            "name": "テレビアニメーション"
        }
    },
    //省略
]

```
### GET　`/Api/v1/programs/tvanimes/{year}/{season_id}`

#### Response例
```json
$ curl http://2ndrelaypumpstation.net/Api/v1/programs/2018/1
[
    {
        "id": 165,
        "title": "アイドリッシュセブン",
        "kana_title": "アイドリッシュセブン",
        "other_title_01": "IDOLiSH7",
        "other_title_02": "アイドリッシュセブン",
        "anisoninfo_program_id": 20745,
        "broadcast_start_on": "2018-01-01",
        "program_type": {
            "id": 2,
            "code": "TV",
            "name": "テレビアニメーション"
        }
    },
    {
        "id": 1415,
        "title": "伊藤潤二『コレクション』",
        "kana_title": "イトウジュンジコレクション",
        "other_title_01": "",
        "other_title_02": "",
        "anisoninfo_program_id": 20829,
        "broadcast_start_on": "2018-01-05",
        "program_type": {
            "id": 2,
            "code": "TV",
            "name": "テレビアニメーション"
        }
    },
    //省略
]

```


### GET `/Api/v1/songs`

#### Response例
```json
$ curl http://2ndrelaypumpstation.net/Api/v1/songs

[
    {
        "id": 18027,
        "title": "キミガタメ Re:boot",
        "anisoninfo_song_id": 112650,
        "program": {
            "id": 1882,
            "title": "うたわれるもの~散りゆく者への子守唄~",
            "kana_title": "ウタワレルモノチリユクモノヘノコモリウタ",
            "other_title_01": "",
            "other_title_02": "",
            "anisoninfo_program_id": 8352,
            "broadcast_start_on": "2006-10-26",
            "program_type": {
                "id": 3,
                "code": "GM",
                "name": "ゲーム"
            }
        },
        "song_role": {
            "id": 2,
            "code": "ED",
            "name": "エンディングテーマ"
        },
        "singer": {
            "id": 3715,
            "name": "Suara"
        }
    },
    {
        "id": 18025,
        "title": "君だけの旅路 Re:boot",
        "anisoninfo_song_id": 112649,
        "program": {
            "id": 1882,
            "title": "うたわれるもの~散りゆく者への子守唄~",
            "kana_title": "ウタワレルモノチリユクモノヘノコモリウタ",
            "other_title_01": "",
            "other_title_02": "",
            "anisoninfo_program_id": 8352,
            "broadcast_start_on": "2006-10-26",
            "program_type": {
                "id": 3,
                "code": "GM",
                "name": "ゲーム"
            }
        },
        "song_role": {
            "id": 1,
            "code": "OP",
            "name": "オープニングテーマ"
        },
        "singer": {
            "id": 3715,
            "name": "Suara"
        }
    }
    //省略
]
```

### GET `/Api/v1/songs?title={任意の文字列}`

#### Response例
```json
$ curl http://2ndrelaypumpstation.net/Api/v1/songs?title=観測者

[
    {
        "id": 22133,
        "title": "スカイクラッドの観測者",
        "anisoninfo_song_id": 59464,
        "program": {
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
            }
        },
        "song_role": {
            "id": 1,
            "code": "OP",
            "name": "オープニングテーマ"
        },
        "singer": {
            "id": 3363,
            "name": "いとうかなこ"
        }
    },
    {
        "id": 23828,
        "title": "スカイクラッドの観測者",
        "anisoninfo_song_id": 59464,
        "program": {
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
            }
        },
        "song_role": {
            "id": 2,
            "code": "ED",
            "name": "エンディングテーマ"
        },
        "singer": {
            "id": 3363,
            "name": "いとうかなこ"
        }
    }
]
```


### GET `/Api/v1/songs/{id}`

#### Response例
```json
$ curl http://2ndrelaypumpstation.net/Api/v1/songs/22133

{
    "id": 22133,
    "title": "スカイクラッドの観測者",
    "anisoninfo_song_id": 59464,
    "program": {
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
        }
    },
    "song_role": {
        "id": 1,
        "code": "OP",
        "name": "オープニングテーマ"
    },
    "singer": {
        "id": 3363,
        "name": "いとうかなこ"
    }
}

```


### GET `/Api/v1/singers?name={任意の文字列}`

#### Response例
```json

$ curl http://2ndrelaypumpstation.net/Api/v1/singers?name=いとうかなこ
[
    {
        "id": 3363,
        "name": "いとうかなこ"
    },
    {
        "id": 7535,
        "name": "栗林みな実,rino,yozuca*,いとうかなこ,マヨちゃん,ジョイまっくす"
    },
    {
        "id": 7552,
        "name": "いとうかなこ,ZIZZ"
    },
    {
        "id": 8507,
        "name": "いとうかなこ,Zwei"
    },
    {
        "id": 8614,
        "name": "彩音,いとうかなこ"
    },
    {
        "id": 8769,
        "name": "いとうかなこ,ワタナベカズヒロ"
    }
]

```

### GET `/Api/v1/singers/{id}`

#### Response例
```json

$ curl http://2ndrelaypumpstation.net/Api/v1/singers/3363


{
    "id": 3363,
    "name": "いとうかなこ",
    "songs": [
        {
            "id": 13249,
            "title": "青い記憶",
            "anisoninfo_song_id": 25127,
            "song_role": {
                "id": 1,
                "code": "OP",
                "name": "オープニングテーマ"
            },
            "program": {
                "id": 13794,
                "title": "Hello, world",
                "kana_title": "ハローワールド",
                "other_title_01": "",
                "other_title_02": "",
                "anisoninfo_program_id": 4773,
                "broadcast_start_on": "2002-09-27",
                "program_type": {
                    "id": 3,
                    "code": "GM",
                    "name": "ゲーム"
                }
            }
        },
        {
            "id": 13251,
            "title": "煌星",
            "anisoninfo_song_id": 25129,
            "song_role": {
                "id": 2,
                "code": "ED",
                "name": "エンディングテーマ"
            },
            "program": {
                "id": 13794,
                "title": "Hello, world",
                "kana_title": "ハローワールド",
                "other_title_01": "",
                "other_title_02": "",
                "anisoninfo_program_id": 4773,
                "broadcast_start_on": "2002-09-27",
                "program_type": {
                    "id": 3,
                    "code": "GM",
                    "name": "ゲーム"
                }
            }
        }
        //省略
    ]
}



```


### 各データ構造
#### program

##### 概要
- 番組データ
- ゲームや劇場版等の情報もある

##### Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|program_id|7590
title|string|番組タイトル|"Steins;Gate"|
kana_title|string|番組タイトルの読み仮名|"シュタインズゲート"
other_title_01|string|番組タイトル予備枠01|""|
other_title_01|string|番組タイトル予備枠02|""|
anisoninfo_program_id|Number|[AnisonGeneration](http://http://anison.info/ "AnisonGeneration")上の管理番号|13401
broadcast_start_on|Date|放送開始年月日(yyyy-MM-dd)ゲームの場合は発売日、劇場版の場合は公開日|"2011-04-06"|
program_type|program_type|番組種別|{"id":2,"code":"TV","name":"テレビアニメーション"}|
game_genre|game_genre|ゲームのジャンル種別|{"id":1,"name":""}|

#### program_type
##### 概要
- 番組種別（TVアニメーション、ゲーム、劇場版など）

##### Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|program_type_id|2
code|string|番組種別コード|TV
name|string|番組種別名称|テレビアニメーション


#### game_genre
##### 概要
- ゲームのジャンル種別（RPG、アクション、アドベンチャーなど）
- 番組種別がゲームでない場合は該当なしのデータが入る

##### Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|game_genre_id|6
name|string|ゲームジャンル名称|アドベンチャー

#### song
##### 概要
- 楽曲データ

##### Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|song_id|23825
title|string|楽曲タイトル|"Hacking to the Gate"|
anisoninfo_song_id|Number|[AnisonGeneration](http://http://anison.info/ "AnisonGeneration")上の管理番号|67986|
singer|singer|歌手データ|{"id":3363,"name":"いとうかなこ"}|
program|program|タイアップ番組のデータ|レスポンス例を参照のこと
song_role|song_role|楽曲の役割(OP、EDなど)|{"id":1,"code":"OP","name":"オープニングテーマ"}|

#### singer
##### 概要
- 歌手データ

##### Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|song_id|3363
name|string|歌手名|いとうかなこ|

#### song_role
##### 概要
- 楽曲の役割種別データ

##### Model
|Property|Value|description|Sample
|-|-|-|-|
id|Number|song_id|1
code|string|楽曲の役割種別コード|OP
name|string|楽曲の役割種別名称|オープニングテーマ|
