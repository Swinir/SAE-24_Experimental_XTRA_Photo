import sql_bridge

def entry_create(severity):
    if severity == 'notice':
            log_level = 0
            sql_bridge.Db_Insert(severity, "logs", "fields", "char")

    if severity == 'notice':
            log_level = 1

    if severity == 'warning':
            log_level = 2

    if severity == 'critical':
            log_level = 3
