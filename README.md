# graphql-test
GraphQLの実装をphpで行ってみました

## php framework
Slim4系を利用してます

## GraphQL ライブラリ
graphql-phpを利用しています

## クライアント
まだこのリポジトリには入れてないため、
Altair GraphQL Clientのブラウザ拡張などを使って確認することを想定しています

## Examples
### Query
全てのユーザ情報を取得します
```
{
  users {
    id
    name
    autonomyId
    autonomy {
      id
      name
      prefectureId
      prefecture {
        id
        name
        enName
      }
    }
  }
}
```

指定したidのユーザ情報を取得します
```
{
  users {
    id
    name
    autonomyId
    autonomy {
      id
      name
      prefectureId
      prefecture {
        id
        name
        enName
      }
    }
  }
}
```

全ての都道府県情報を取得します
```
{
  prefectures {
    id
    name
    enName
  }
}
```

指定したidの都道府県情報を取得します
```
{
  prefecture(id: 12) {
    id
    name
    enName
  }
}
```
