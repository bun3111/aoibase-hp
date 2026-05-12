# AOi Base HP — 開発環境セットアップ

株式会社AOi Base コーポレートサイト（https://aoibase.jp/ ）の WordPress カスタムテーマ開発リポジトリ。

## 前提条件

- Git
- Claude Code（CLI / デスクトップアプリ / IDE拡張）
- Node.js 18+（Playwright MCP 用）

## セットアップ

### 1. リポジトリのクローン

```bash
# Mac
cd ~/Desktop
git clone https://github.com/bun3111/aoibase-hp.git "aoibase HP"
cd "aoibase HP"

# Windows (Git Bash)
cd "$(powershell.exe -Command "[Console]::OutputEncoding=[System.Text.Encoding]::UTF8;[Environment]::GetFolderPath('Desktop')" | tr -d '\r')"
git clone https://github.com/bun3111/aoibase-hp.git "aoibase HP"
cd "aoibase HP"
```

### 2. Git ユーザー設定

```bash
git config user.name "あなたの名前"
git config user.email "your-email@example.com"
```

### 3. セットアップスクリプト実行

```bash
bash setup.sh
```

スクリプトが以下を自動実行:
- OS 判定
- `.claude/settings.local.json` 作成（gitignore済み）
- Playwright MCP のインストール確認

### 4. Claude Code で開発開始

プロジェクトディレクトリで Claude Code を起動するだけ。`CLAUDE.md` が自動で読み込まれ、プロジェクトの全コンテキストが共有される。

```bash
claude
```

起動後、開発プロンプトを投げるだけで作業が進む:

```
# 例
「トップページのCTAボタンの色を変更して」
「会社概要ページにチームセクションを追加して」
「セキュリティページのレスポンシブ対応を修正して」
```

## Playwright MCP セットアップ（手動の場合）

setup.sh が自動で処理するが、問題があれば手動実行:

```bash
npm install -g @anthropic-ai/mcp-playwright
npx playwright install chromium
```

`~/.claude/settings.json` に以下をマージ:

```json
{
  "mcpServers": {
    "playwright": {
      "command": "npx",
      "args": ["-y", "@anthropic-ai/mcp-playwright"]
    }
  }
}
```

設定後、Claude Code の再起動が必要。

## ブランチ運用

**master への直接 push 禁止。** 全変更は feature branch → PR → レビュー → マージで行う。

```bash
# 新機能
git checkout -b feat/team-section

# バグ修正
git checkout -b fix/responsive-header

# 作業後
git push -u origin feat/team-section
# → GitHub で PR 作成
```

詳細は [CONTRIBUTING.md](CONTRIBUTING.md) を参照。

## ディレクトリ構成

```
aoibase HP/
├── CLAUDE.md              # Claude Code 用プロジェクト定義
├── README.md              # このファイル
├── CONTRIBUTING.md        # 開発ルール・ブランチ運用
├── setup.sh               # セットアップスクリプト
├── .github/
│   └── PULL_REQUEST_TEMPLATE.md
├── .claude/
│   ├── settings.json      # ECC hooks（共有）
│   └── settings.local.json # ローカル設定（gitignore）
└── aoibase-theme/         # WordPress テーマ本体
    ├── style.css
    ├── front-page.php
    ├── page-*.php
    ├── functions.php
    ├── inc/
    ├── assets/
    └── ...
```

## デプロイ

本番デプロイは安全ゲート付き。Claude Code に「デプロイして」と伝えると手順を案内する。実行には合言葉「本番デプロイ承認」が必要。
