# Buto-Plugin-AccountAssignmen_v1
Widget to render cards from account with an given role.

## Image folder
Put account images in this folder.
Named with username and jpg extension
```
/theme/[theme]/account/img
```

## Settings
```
plugin:
  account:
    assignment_v1:
      enabled: true
      settings:
        mysql: 'yml:/../buto_data/theme/[theme]/mysql.yml'
```

## Widget cards
Render all accounts for with an given role.
In this example all with role webmaster.
Shows image, fullname, email, phone.
```
type: widget
data:
  plugin: account/assignment_v1
  method: cards
  data:
```
Role.
```
    role: webmaster
```
Order by (optional, default is fullname).
```
    order_by:
      key: fullname
```
