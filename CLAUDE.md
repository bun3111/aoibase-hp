# CLAUDE.md — AOi Base HP 開発ガイド

## Communication
- 日本語で会話。英語は技術用語のみ許可
- タメ口。敬語禁止
- 出力は端的・最小限。冗長な説明・前置き不要
- 聞かれたことだけ答える。勝手に話を広げない

---

## プロジェクト概要

- **サイト**: https://aoibase.jp/（株式会社AOi Base コーポレートサイト）
- **会社名表記**: **AOi Base**（"AOIbase" は旧表記、使用禁止）
- **スタック**: WordPress 6.9 / Xserver / カスタムテーマ `aoibase-theme`
- **GitHub**: https://github.com/bun3111/aoibase-hp.git
- **本番ブランチ**: `master`

---

## 環境セットアップ（自動判定）

Claude Code 起動時に以下を自動実行:

1. **OS判定**: `uname` で Mac / Windows を判定し、パス・コマンドを切替
2. **リポジトリ確認**:
   - Mac: `~/Desktop/aoibase HP/`
   - Windows: デスクトップの `aoibase HP/`（OneDrive配下の場合あり）
3. **存在する** → `git pull origin master` で最新化 → `style.css` の Version 確認
4. **存在しない** → `README.md` のセットアップ手順に従いクローン
5. **Playwright MCP 確認**: `browser_navigate` で https://aoibase.jp/ を開く。動かなければ README.md の Playwright セットアップを実行
6. すべてOKなら「開発準備OK（vX.X.X）」と報告し、指示を待つ

---

## ブランチ運用（GitHub Flow）

**master への直接 push 禁止。全変更は PR 経由。**

1. master から feature branch を作成: `feat/xxx`, `fix/xxx`, `refactor/xxx`, `docs/xxx`, `chore/xxx`
2. feature branch で作業・コミット
3. GitHub に push → PR 作成
4. レビュー承認後、master に Squash merge
5. マージ後、feature branch を削除

### コミット規約
- 形式: `<type>: <description>`（日本語OK）
- type: feat / fix / refactor / docs / chore
- 例: `feat: 会社概要ページにチームセクション追加`

### バージョニング
- `style.css` の `Version` を更新
- バグ修正: パッチ（2.3.0 → 2.3.1）
- 機能追加: マイナー（2.3.x → 2.4.0）
- 大規模変更: メジャー（2.x.x → 3.0.0）

---

## テーマファイル構成

| ファイル | 役割 | WP固定ページID |
|---------|------|---------------|
| front-page.php | トップページ（デザイン基準） | — |
| page-company.php | 会社概要 | 77 |
| page-news.php | NEWS一覧 | 87 |
| page-flow.php | 開発の流れ | 88 |
| page-contact.php | お問い合わせ | 15 |
| page-security.php | セキュリティリスクとは？ | 113 |
| page-operability.php | 運用のしやすさとは？ | 114 |
| archive-achievement.php | 事例一覧 | — |
| single-achievement.php | 事例詳細（モバイルモーダルあり） | — |
| functions.php / inc/cpt-achievement.php | テーマ機能・CPT定義 | — |
| assets/js/main.js | 共通JS | — |

---

## デザイン仕様

- **色**: 濃紺 `#0F172A`, 青 `#1E40AF` / `#3B82F6` / `#0369A1`, CTA `#B45309`
- **フォント**: Poppins（英字）, Noto Sans JP（日本語）
- **カード**: 白背景, border `#F1F5F9`, hover `translateY(-4px)`
- **CTAバー**: 全ページ `flex flex-wrap` パターン統一
- **キャッチコピー**: 「構想をカタチに」

---

## 実績CPT (post_type: achievement)

| ID | タイトル | スラッグ |
|----|---------|---------|
| 41 | AIらくらくオーダーメイド | ai-order |
| 73 | 株式会社アースライフ様 | earthlife |
| 62 | トランプゲームアプリ | trump-game |
| 56 | 口コミサイト | kuchikomi |

---

## デプロイ手順

### ZIP作成
```bash
# Mac
cd ~/Desktop/aoibase\ HP && zip -r ~/Desktop/aoibase-theme.zip aoibase-theme/ -x "*.git*" "*.DS_Store"

# Windows (PowerShell)
Compress-Archive -Path "<デスクトップ>\aoibase HP\aoibase-theme" -DestinationPath "<デスクトップ>\aoibase-theme.zip" -Force
```

### アップロード（Playwright MCP）
1. `browser_navigate` → `https://aoibase.jp/wp-admin/theme-install.php?upload`
2. テーマのアップロード → `browser_file_upload` でZIP選択 → 今すぐインストール → 置き換える
3. 変更ページを確認

### 注意事項
- ZIPは `/Users/` or `C:\Users\` 配下に置く（/tmp は Playwright MCP からアクセス不可）
- WP管理画面は REST API（`browser_evaluate` で `fetch('/wp-json/wp/v2/...')`）を優先
- スナップショットは `target` パラメータで要素を絞る

---

## Core Principles（最優先）

- **Simplicity First**: 変更は可能な限りシンプルに。影響範囲を最小化
- **No Laziness**: 根本原因を探す。一時的な修正禁止
- **Minimal Impact**: 必要な箇所だけ触る。バグを持ち込まない
- **Staff Engineer Test**: 「スタッフエンジニアがこれを承認するか？」を常に自問

---

## Development Stance

### Demand Elegance (Balanced)
- 非自明な変更では「もっとエレガントな方法はないか？」と立ち止まる
- hacky に感じたら「今知っていること全てを踏まえて、エレガントな解を実装する」
- 単純で明白な修正にはこれを適用しない。過剰設計禁止
- 自分の成果物を提出前に自分で批判する

### Autonomous Bug Fixing
- バグ報告を受けたら、確認を求めずに自分で直す
- ログ、エラー、失敗テストを自分で特定し、解決する
- ユーザーのコンテキストスイッチをゼロにする

---

## Safety Gate

- 本番デプロイ: 合言葉 **「本番デプロイ承認」** の完全一致パスフレーズが必須
- 不可逆操作（DB マイグレーション、本番デプロイ等）は必ず確認を取る
- read-only で確認すべき場面では、先に確認してから変更する

---

## ECC Integration

以下は ECC に委譲。CLAUDE.md では定義しない:
- 実装計画 → `/plan`
- サブエージェント戦略 → ECC エージェント定義
- テスト駆動開発 → `/tdd`
- コードレビュー → `/code-review`
- 検証ループ → `/verify`, `/quality-gate`
- セッション管理 → `/save-session`, `/resume-session`
- 学習・改善 → `/learn`, Instinct システム

### モデル選択
ECC のモデルルーティング（タスク別に Opus/Sonnet/Haiku 自動選択）を優先。

### 学習データ運用
- Instinct（継続学習）有効、上限 50件
- セッション終了時: `/instinct-export` でエクスポート
