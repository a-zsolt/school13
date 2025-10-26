export function validateTitle(title) {
    if (typeof title !== 'string') {
        return {ok: false, error: 'Érvénytelen típus.'}
    }
    const trimmed = title.trim()
    if (trimmed.length < 1) {
        return {ok: false, error: 'Adj meg legalább egy karaktert.'}
    }
    if (trimmed.length > 120) {
        return {ok: false, error: "Legfeljebb 120 kerakter lehet."}
    }
    const hasWordLike = /[\p{L}\p{N}]/u.test(trimmed);
    if (!hasWordLike) {
        return {ok: false, error: 'Adj meg értekmes címet.'}
    }
    return {ok: true, value: trimmed}
}