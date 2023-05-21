$shell = New-Object -ComObject WScript.Shell
$desktop = $shell.SpecialFolders("Desktop")
$badLinks = Join-Path $desktop "BadLinks"
if (-not (Test-Path $badLinks)) {
    New-Item -ItemType Directory -Path $badLinks | Out-Null
}

Get-ChildItem $desktop -Filter *.lnk | ForEach-Object {
    $link = $shell.CreateShortcut($_.FullName)
    if (-not (Test-Path $link.TargetPath)) {
        Move-Item $_.FullName $badLinks
    }
}
