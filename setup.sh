#!/usr/bin/env bash
set -euo pipefail

echo "=== AOi Base HP — セットアップ ==="

# OS判定
OS="unknown"
case "$(uname -s)" in
  Darwin*)  OS="mac" ;;
  MINGW*|MSYS*|CYGWIN*) OS="windows" ;;
  Linux*)   OS="linux" ;;
esac
echo "[1/4] OS: $OS"

# プロジェクトルート検出
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_ROOT="$SCRIPT_DIR"
echo "[2/4] Project: $PROJECT_ROOT"

# .claude/settings.local.json 作成（存在しなければ）
LOCAL_SETTINGS="$PROJECT_ROOT/.claude/settings.local.json"
if [ ! -f "$LOCAL_SETTINGS" ]; then
  cat > "$LOCAL_SETTINGS" << JSONEOF
{
  "env": {
    "ECC_HOOK_PROFILE": "standard",
    "CLAUDE_PLUGIN_ROOT": "$PROJECT_ROOT/.claude"
  }
}
JSONEOF
  echo "[3/4] Created: .claude/settings.local.json"
else
  echo "[3/4] Already exists: .claude/settings.local.json"
fi

# Playwright MCP 確認
if command -v npx &> /dev/null; then
  if npx --yes @anthropic-ai/mcp-playwright --version &> /dev/null 2>&1; then
    echo "[4/4] Playwright MCP: OK"
  else
    echo "[4/4] Playwright MCP: installing..."
    npm install -g @anthropic-ai/mcp-playwright
    npx playwright install chromium
    echo "[4/4] Playwright MCP: installed"
    echo ""
    echo ">>> ~/.claude/settings.json に以下を追加してください:"
    echo '  "mcpServers": {'
    echo '    "playwright": {'
    echo '      "command": "npx",'
    echo '      "args": ["-y", "@anthropic-ai/mcp-playwright"]'
    echo '    }'
    echo '  }'
    echo ""
    echo ">>> 追加後、Claude Code を再起動してください"
  fi
else
  echo "[4/4] Node.js/npm が見つかりません。インストールしてください"
  echo "    https://nodejs.org/"
fi

echo ""
echo "=== セットアップ完了 ==="
echo "次のステップ:"
echo "  1. git config user.name \"あなたの名前\""
echo "  2. git config user.email \"your-email@example.com\""
echo "  3. claude  ← Claude Code を起動して開発開始"
