# 開発ルール — AOi Base HP

## ブランチ戦略（GitHub Flow）

```
master（本番）
  ├── feat/xxx    ← 新機能
  ├── fix/xxx     ← バグ修正
  ├── refactor/xxx ← リファクタ
  ├── docs/xxx    ← ドキュメント
  └── chore/xxx   ← 雑務・設定変更
```

### ルール

1. **master は常にデプロイ可能な状態を維持する**
2. **master への直接 push 禁止** — 全変更は PR 経由
3. feature branch は master から作成し、master にマージ
4. PR は最低1人のレビュー承認が必要
5. マージ方法: **Squash merge**（コミット履歴をクリーンに保つ）
6. マージ後の feature branch は削除する

### ブランチ命名規則

```
<type>/<短い説明（英語、ケバブケース）>
```

例:
- `feat/team-section`
- `fix/mobile-header-overlap`
- `refactor/cta-component`
- `docs/update-readme`
- `chore/bump-version`

## コミット規約

```
<type>: <description>
```

- type: `feat` / `fix` / `refactor` / `docs` / `chore`
- description: 日本語OK。何を変えたか端的に
- 例: `feat: 会社概要ページにチームセクション追加`
- 例: `fix: モバイルでヘッダーがずれる問題を修正`

## PR 運用

### 作成手順

```bash
# 1. master を最新化
git checkout master
git pull origin master

# 2. feature branch を作成
git checkout -b feat/your-feature

# 3. 作業・コミット
git add <files>
git commit -m "feat: やったこと"

# 4. push して PR 作成
git push -u origin feat/your-feature
# GitHub で PR を作成（テンプレートが自動適用される）
```

### Claude Code での PR 作成

Claude Code に「PRを作成して」と伝えれば、差分の確認から PR 作成まで自動で行う。

### レビュー観点

- [ ] デザイン仕様（色・フォント・余白）に準拠しているか
- [ ] モバイル/タブレット/デスクトップで崩れないか
- [ ] 他ページへの影響がないか
- [ ] コミットメッセージが規約に沿っているか
- [ ] 不要なファイル（.zip, .DS_Store 等）が含まれていないか

## バージョニング

`aoibase-theme/style.css` の `Version` フィールドで管理。

| 変更の規模 | バージョン例 | ルール |
|-----------|------------|--------|
| バグ修正 | 2.3.0 → 2.3.1 | パッチ |
| 機能追加 | 2.3.x → 2.4.0 | マイナー |
| 大規模変更 | 2.x.x → 3.0.0 | メジャー |

バージョンは PR 単位で更新する（1つの PR に1回）。

## デプロイルール

- 本番デプロイは master マージ後に実施
- 合言葉「本番デプロイ承認」が必要（CLAUDE.md の Safety Gate）
- デプロイ後、Playwright MCP で変更ページの目視確認を行う

## Claude Code での開発フロー

```
[メンバー] プロンプトを投げる
    ↓
[Claude Code] CLAUDE.md を読み込み、コンテキストを把握
    ↓
[Claude Code] feature branch 作成 → 実装 → コミット → push → PR 作成
    ↓
[メンバー/Claude Code] PR レビュー
    ↓
[メンバー] マージ承認
    ↓
[メンバー] 本番デプロイ（承認制）
```

チームメンバーがやることは **プロンプトを投げる** と **レビュー・承認** だけ。
