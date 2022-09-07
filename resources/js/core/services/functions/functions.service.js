export function getParams(key) {
    let result

    window.location.href
        .split("?")
        .forEach(function (item, index) {
            if (index === 1)
                item.split("&")
                    .forEach(function (it) {
                        let temp = it.split("=")

                        if (temp[0] === key)
                            result = decodeURIComponent(temp[1])
                    })
        })

    return result
}

export function getLastSlug() {
    let result

    window.location.href
        .split("?")
        .forEach(function (item, index) {
            if (index === 0)
                item.split("/")
                    .forEach(function (it, ind, array) {
                        if (ind === array.length - 1)
                            result = decodeURIComponent(it)
                    })
        })

    return result
}
